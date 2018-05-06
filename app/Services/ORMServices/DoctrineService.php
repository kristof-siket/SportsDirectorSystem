<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.05.06.
 * Time: 15:00
 */

namespace App\Services\ORMServices;

use Doctrine\ORM\EntityManager;

abstract class DoctrineService
{
    /**
     * @var EntityManager
     */
    protected $em;

    public function __construct($em)
    {
        $this->em = $em;
    }
}