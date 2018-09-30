<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.03.20.
 * Time: 19:19
 */

namespace App\Services\Interfaces;

use App\Entities\AnalyzerResult;
use App\Entities\Result;
use App\Entities\User;
use App\Services\ORMServices\DoctrineService;
use App\Services\Repository\Result\ResultRepoDoctrine;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class ResultAnalyzerDataMapper extends DoctrineService implements IResultAnalyzer
{
    public function __construct($em)
    {
        $this->em = $em;
        parent::__construct($em, $this->em->getClassMetadata(Result::class));
    }

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
     * @param $result mixed
     */
    public function getStatistics($result)
    {
        $tempos = $this->getFullTempoData(0.5, $result);
        $pulses = $this->getFullPulseData($result);

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
}