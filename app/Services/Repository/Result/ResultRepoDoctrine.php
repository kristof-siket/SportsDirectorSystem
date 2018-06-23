<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.05.06.
 * Time: 19:00
 */

namespace App\Services\Repository\Result;

use App\Entities\Result;
use App\Services\ORMServices\DoctrineService;
use Doctrine\ORM\EntityRepository;

class ResultRepoDoctrine extends DoctrineService implements IResultRepository
{
    /**
     * @var EntityRepository $repo
     */
    private $repo;

    public function getCompetitionResults($competition)
    {
        // TODO: Implement getCompetitionResults() method.
    }

    public function getAthleteResults($athlete)
    {
        // TODO: Implement getAthleteResults() method.
    }

    public function getResultById($result_id)
    {
        return $this->repo->find($result_id);
    }

    public function __construct($em)
    {
        parent::__construct($em);
        $this->repo = $this->em->getRepository(Result::class);
    }
}