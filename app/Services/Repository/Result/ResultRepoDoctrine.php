<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.05.06.
 * Time: 19:00
 */

namespace App\Services\Repository\Result;

use App\Entities\Competition;
use App\Entities\Result;
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
     * @param $athlete int
     * @return array
     */
    public function getAthleteResults($athlete)
    {
        $qb = $this->em->createQueryBuilder();

        $query = $qb->select('r')
            ->from('App\Entities\Result', 'r')
            ->join('r.result_athlete', 'a')
            ->where('a.id = :user_id AND r.result_time > 0')
            ->setParameter('user_id', $athlete)
            ->getQuery();

        return $query->getResult();
    }

    /**
     * @param $result_id int
     * @return null|Result
     */
    public function getResultById($result_id)
    {
        return $this->find($result_id);
    }

    /**
     * ResultRepoDoctrine constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        parent::__construct($em, $em->getClassMetadata(Result::class));
    }
}