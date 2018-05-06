<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.03.20.
 * Time: 19:19
 */

namespace App\Services\Interfaces;

use App\Entities\Result;
use App\Services\ORMServices\DoctrineService;
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
        // TODO: Implement getFullPulseData() method.
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
        // TODO: Implement getFullTempoData() method.
    }

    /**
     * @param $user_id int
     * @return mixed
     */
    public function getResultsOfUser($user_id)
    {
        $query = $this->em->createQuery('SELECT r FROM Result WHERE r.result_athlete == :user_id')
            ->setParameter('user_id', $user_id);

        return $query->getResult();
    }

    /**
     * Gets the id-s of Result collection to be shown on UI.
     * @param $results mixed
     * @return mixed
     */
    public function getResultsId($results)
    {
        $query = $this->em->createQueryBuilder();
        $res = $query->select('r.result_id')
            ->from($results, 'r')
            ->getQuery()->getResult();

        return $res;
    }
}