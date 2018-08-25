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
     * @param $competition Competition
     * @return array
     */
    public function getCompetitionResults($competition)
    {
        return $this->findBy(array('result_competition' => $competition));
    }

    public function getAthleteResults($athlete)
    {
            $builder = $this->em->createQueryBuilder();
            $query = $builder->select('r"')
                ->from('App\Entities\Result', 'r')
                ->where('r.result_athlete = :athlete')
                ->setParameter('athlete', $athlete)
                ->getQuery();

            return $query->getResult();
    }

    public function getResultById($result_id)
    {
        return $this->find($result_id);
    }


    public function __construct(EntityManager $em)
    {
        parent::__construct($em, $em->getClassMetadata(Result::class));
    }
}