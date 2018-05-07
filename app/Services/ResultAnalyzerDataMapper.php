<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.03.20.
 * Time: 19:19
 */

namespace App\Services\Interfaces;

use App\Entities\Result;
use App\Entities\User;
use App\Services\ORMServices\DoctrineService;
use App\Services\Repository\Result\ResultRepoDoctrine;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;

class ResultAnalyzerDataMapper extends DoctrineService implements IResultAnalyzer
{
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
     * @param $result mixed
     */
    public function getFullResultAnalysis($result)
    {
        // TODO: Implement getFullResultAnalysis() method.
    }

    /**
     * Gets the full set of pulse data from the analyzer results.
     * @param mixed $result
     * @return mixed
     */
    public function getFullPulseData($result)
    {
        $qb = $this->em->createQueryBuilder();

        /**
         * @var Result $result
         */
        $query = $qb->select('a.aresult_pulse')
            ->from('App\Entities\AnalyzerResult', 'a')
            ->where('a.aresult_result = :result_id')
            ->setParameter('result_id', $result->getResultId())
            ->getQuery();

        $pulses = $query->getResult();

        $res = array();

        $i = 0;
        foreach ($pulses as $pulse) {
            $res[$i] = $pulse['aresult_pulse'];
            $i++;
        }

        return $res;
    }

    /**
     * Gets the full set of kilometers data from the analyzer results.
     * @param mixed $result
     * @return mixed
     */
    public function getFullKilometerData($result)
    {
        // TODO: Implement getFullKilometerData() method.
    }

    /**
     * Calculates the athlete's tempo (km/h) for every timestamps
     * @param float $sampleRate
     * @param mixed $result
     * @return mixed
     */
    public function getFullTempoData(float $sampleRate, $result)
    {
        $qb = $this->em->createQueryBuilder();

        /**
         * @var Result $result
         */
        $query = $qb->select('a.aresult_kilometers')
            ->from('App\Entities\AnalyzerResult', 'a')
            ->where('a.aresult_result = :result_id')
            ->setParameter('result_id', $result->getResultId())
            ->getQuery();

        $kilometers = $query->getResult();

        $tempos = array();

        for ($i = 1; $i < sizeof($kilometers); $i++) {
            $tempos[$i-1] = ($kilometers[$i]['aresult_kilometers'] - $kilometers[$i-1]['aresult_kilometers']) / ($sampleRate / 60 / 60);
        }

        return $tempos;
    }

    /**
     * @param $user_id int
     * @return mixed
     */
    public function getResultsOfUser($user_id)
    {
        $qb = $this->em->createQueryBuilder();
        $query = $qb->select('r')
            ->from('App\Entities\Result', 'r')
            ->join('r.result_athlete', 'a')
            ->where('a.id = :user_id AND r.result_time > 0')
            ->setParameter('user_id', $user_id)
            ->getQuery();

        return $query->getResult();
    }

    /**
     * Gets the id-s of Result collection to be shown on UI.
     * @param $results mixed
     * @return mixed
     */
    public function getResultsId($results)
    {
        //dump($results);
        /**
         * @var Result[] $results
         */

        $ids = array();

        $i = 0;

        foreach ($results as $result) {
            $ids[$i] = $result->getResultId();
            $i++;
        }

        //dump($ids);
        return $ids;
    }

    /**
     * @return \App\Services\Repository\Result\IResultRepository|ResultRepoDoctrine
     */
    public function getResultRepository()
    {
        return new ResultRepoDoctrine(app('em'));
    }


}