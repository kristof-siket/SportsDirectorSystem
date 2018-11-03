<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.05.06.
 * Time: 19:00
 */

namespace App\Services\Repository\Result;

use App\Entities\AnalyzerResult;
use App\Entities\Result;
use App\ModelInterfaces\IResult;
use App\Services\ORMServices\DoctrineService;
use Doctrine\ORM\EntityManager;

class ResultRepoDoctrine extends DoctrineService implements IResultRepository
{
    /**
     * @param $competition int
     * @return array
     */
    public function getCompetitionResults($competition)
    {
        $qb = $this->em->createQueryBuilder();

        $query = $qb->select('r')
            ->from('App\Entities\Result', 'r')
            ->join('r.result_competition', 'c')
            ->where('c.comp_id = :comp_id AND r.result_time > 0')
            ->setParameter('user_id', $competition)
            ->getQuery();

        return $query->getResult();
    }


    /**
     * @param $result_id int
     * @return Result
     */
    public function getResultById($result_id)
    {
        /**
         * @var Result $result
         */
        $result = $this->find($result_id);

        return $result;
    }

    /**
     * Gets the full set of pulse data from the analyzer results.
     *
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

        // TODO: Find a better solution for getting a normal array of the results!
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
     *
     * @param mixed $result
     * @return mixed
     */
    public function getFullKilometerData($result)
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

        // TODO: Find a better solution for getting a normal array of the results!
        $res = array();
        $i = 0;
        foreach ($kilometers as $kilometer) {
            $res[$i] = $kilometer['aresult_pulse'];
            $i++;
        }

        return $res;
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
        $ids = array();
        $i = 0;

        /**
         * @var Result[] $results
         */
        foreach ($results as $result) {
            $ids[$i] = $result->getResultId();
            $i++;
        }

        return $ids;
    }

    /**
     * ResultRepoDoctrine constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        parent::__construct($em, $em->getClassMetadata(Result::class));
    }

    /**
     * Checks if there was analyzer result data recorded for the specified Result.
     *
     * @param $result IResult
     * @return bool
     */
    public function checkIfAnalyzerResultDataExist($result): bool
    {
        $qb = $this->em->createQueryBuilder();

        $query = $qb->select('a')
            ->from(AnalyzerResult::class, 'a')
            ->where('a.aresult_result = :result_id')
            ->setMaxResults(10)
            ->setParameter('result_id', $result->getResultId())
            ->getQuery();

        return !empty($query->getResult());
    }
}