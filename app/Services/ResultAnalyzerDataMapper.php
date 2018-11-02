<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.03.20.
 * Time: 19:19
 */

namespace App\Services\Interfaces;

use App\Entities\AnalyzerResult;
use App\Entities\Competition;
use App\Entities\CompetitionDistance;
use App\Entities\Distance;
use App\Entities\Result;
use App\Entities\Team;
use App\Entities\User;
use App\Services\ORMServices\DoctrineService;
use App\Services\Repository\Result\ResultRepoDoctrine;

class ResultAnalyzerDataMapper extends DoctrineService implements IResultAnalyzer
{
    public function __construct($em)
    {
        $this->em = $em;
        parent::__construct($em, $this->em->getClassMetadata(Result::class));
    }

    //region Service Methods
    /**
     * Creates sample data for the analyzer results data table.
     * @param $sampleRate float
     * The frequency of records.
     * @param mixed $result
     * @return void
     */
    public function initializeAnalyzerResults(float $sampleRate, $result)
    {
        // TODO: Implement initializeAnalyzerResults() method.
    }

    /**
     * @return ResultRepoDoctrine
     */
    public function getResultRepository()
    {
        return new ResultRepoDoctrine($this->em);
    }

    /**
     * @param $result Result
     * @return  mixed
     */
    public function getStatistics($result)
    {
        $tempos = $this->getResultRepository()->getFullTempoData(0.5, $result);
        $pulses = $this->getResultRepository()->getFullPulseData($result);

        /**
         * @var Result $result
         */
        $qb = $this->em->createQueryBuilder();
        $query = $qb->select('avg(a.aresult_pulse)')
            ->from(AnalyzerResult::class, 'a')
            ->where('a.aresult_result = :result')
            ->setParameter('result', $result->getResultId())
            ->getQuery();

        
        $pulses = array_filter($pulses);

        $avgpulse =  $query->getArrayResult()[0][1];
        $maxpulse = max($pulses);

        $tempos = array_filter($tempos);

        $avgtempo = (count($tempos) != 0 ? array_sum($tempos)/count($tempos) : 0);
        $maxtempo = max($tempos);

        $statistics = array(
                'avg_pulse' => $avgpulse,
                'avg_tempo' => $avgtempo,
                'max_pulse' => $maxpulse,
                'max_tempo' => $maxtempo);

        return $statistics;
    }

    /**
     * Gets summarized statistics of given competition (global stats).
     *
     * @param $competition Competition
     * @return mixed
     */
    public function getOverallCompetitionStatistics($competition)
    {
        return
            [
                'team_champions' => $this->getBestTeamAverageSpeed($competition),
                'lowest_avg_pulse' => $this->getLowestAveragePulse($competition),
                'highest_avg_pulse' => $this->getHighestAveragePulse($competition),
                'best_fitness' => $this->getBestFitness($competition)
            ];
    }
    //endregion

    //region Private Helper Methods
    /**
     * Gets the best team average speed in the given competition as a key-value pair array.
     *
     * @param Competition $competition
     * @return array
     */
    private function getBestTeamAverageSpeed(Competition $competition) : array
    {
        $qb = $this->em->createQueryBuilder();

        $query = $qb->select
        ("
            t.team_name AS Team,
            CONCAT(u.last_name,' ', u.first_name) as Name,
            (avg(a.aresult_kilometers / a.aresult_timestamp)*60*60) as Average,
            d.distance_name as Distance            
        ")
            ->from(Team::class, 't')
            ->join(User::class, 'u')
            ->join('u.team', 'ut')
            ->join(CompetitionDistance::class, 'cd')
            ->join('cd.distance', 'cdd')
            ->join('cd.competition', 'cdc')
            ->join(AnalyzerResult::class, 'a')
            ->join(Distance::class, 'd')
            ->join(Result::class, 'r')
            ->where
            ('a.aresult_result = r.result_id AND
                        r.result_athlete = u.id AND
                        t.team_id = ut.team_id AND
                        r.result_distance = cdd.distance_id AND
                        cdc.comp_id = :comp_id AND
                        d.distance_id = cdd.distance_id AND                                                
                        r.result_competition = :comp_id')
            ->groupBy('Distance', 'Team', 'Name')
            ->setParameters(['comp_id' => $competition->getCompId()])
            ->getQuery();

        $teamChampions = $query->getArrayResult();

        return $teamChampions;
    }

    /**
     * Gets the athlete with the lowest average pulse as a key-value array.
     *
     * @param $competition Competition
     * @return array
     */
    private function getLowestAveragePulse($competition)
    {
        $qb = $this->em->createQueryBuilder();

        $query  = $qb->select
        ("
            u.id as ID,
            CONCAT(u.last_name,' ', u.first_name) as Name,
            avg(a.aresult_pulse) as AveragePulse
        ")
            ->from(AnalyzerResult::class, 'a')
            ->join(User::class, 'u')
            ->join(CompetitionDistance::class, 'cd')
            ->join('cd.distance', 'cdd')
            ->join('cd.competition', 'cdc')
            ->join(Distance::class, 'd')
            ->join(Result::class, 'r')
            ->where
            ('a.aresult_result = r.result_id AND
                        r.result_athlete = u.id AND
                        r.result_distance = cdd.distance_id AND
                        cdc.comp_id = :comp_id AND
                        d.distance_id = cdd.distance_id AND                                                
                        r.result_competition = :comp_id')
            ->groupBy('Name')
            ->orderBy('AveragePulse', 'ASC')
            ->setParameters(['comp_id' => $competition->getCompId()])->getQuery();

        $lowestAvgPulse = $query->getArrayResult()[0];

        return $lowestAvgPulse;
    }

    /**
     * Gets the athlete with the highest average pulse as a key-value array.
     *
     * @param $competition Competition
     * @return array
     */
    private function getHighestAveragePulse($competition)
    {
        $qb = $this->em->createQueryBuilder();

        $query  = $qb->select
        ("
            u.id as ID,
            CONCAT(u.last_name,' ', u.first_name) as Name,
            avg(a.aresult_pulse) as AveragePulse
        ")
            ->from(AnalyzerResult::class, 'a')
            ->join(User::class, 'u')
            ->join(CompetitionDistance::class, 'cd')
            ->join('cd.distance', 'cdd')
            ->join('cd.competition', 'cdc')
            ->join(Distance::class, 'd')
            ->join(Result::class, 'r')
            ->where
            ('a.aresult_result = r.result_id AND
                        r.result_athlete = u.id AND
                        r.result_distance = cdd.distance_id AND
                        cdc.comp_id = :comp_id AND
                        d.distance_id = cdd.distance_id AND                                                
                        r.result_competition = :comp_id')
            ->groupBy('Name')
            ->orderBy('AveragePulse', 'DESC')
            ->setParameters(['comp_id' => $competition->getCompId()])->getQuery();

        $lowestAvgPulse = $query->getArrayResult()[0];

        return $lowestAvgPulse;
    }

    /**
     * Gets the best average pulse / average tempo value ("best fittness") of a competition.
     *
     * @param $competition Competition
     * @return array
     */
    private function getBestFitness($competition)
    {
        $qb = $this->em->createQueryBuilder();

        $query = $qb->select
        ("
            CONCAT(u.last_name,' ', u.first_name) as Name,
            avg(a.aresult_pulse) as AveragePulse,
            (avg(a.aresult_kilometers / a.aresult_timestamp)*60*60) as AverageTempo,
            (avg(a.aresult_pulse)) / (avg(a.aresult_kilometers / a.aresult_timestamp)*60*60) as Fitness
        ")
            ->from(AnalyzerResult::class, 'a')
            ->join(User::class, 'u')
            ->join(CompetitionDistance::class, 'cd')
            ->join('cd.distance', 'cdd')
            ->join('cd.competition', 'cdc')
            ->join(Distance::class, 'd')
            ->join(Result::class, 'r')
            ->where
            ('a.aresult_result = r.result_id AND
                        r.result_athlete = u.id AND
                        r.result_distance = cdd.distance_id AND
                        cdc.comp_id = :comp_id AND
                        d.distance_id = cdd.distance_id AND                                                
                        r.result_competition = :comp_id')
            ->groupBy('Name')
            ->orderBy('Fitness', 'DESC')
            ->setParameters(['comp_id' => $competition->getCompId()])->getQuery();

        $bestFittness = $query->getArrayResult()[0];

        return $bestFittness;
    }
    //endregion
}