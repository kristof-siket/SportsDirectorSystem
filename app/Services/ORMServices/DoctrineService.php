<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.05.06.
 * Time: 15:00
 */

namespace App\Services\ORMServices;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping;

abstract class DoctrineService extends EntityRepository
{
    /**
     * @var EntityManager
     */
    protected $em;

    public function __construct($em, Mapping\ClassMetadata $class)
    {
        $this->em = $em;
        parent::__construct($em, $class);
    }
}