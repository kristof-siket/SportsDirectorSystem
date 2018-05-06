<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.04.30.
 * Time: 10:50
 */

namespace App\Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="sports")
 */
class Sport
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $sport_id;

    /**
     * @var string $sport_name
     * @ORM\Column(type="string")
     */
    protected $sport_name;

    /**
     * @var bool $multisport
     * @ORM\Column(type="string")
     */
    protected $multisport;

    /**
     * @var string $sport_desc
     * @ORM\Column(type="string")
     */
    protected $sport_desc;

    /**
     * @return mixed
     */
    public function getSportId()
    {
        return $this->sport_id;
    }

    /**
     * @param mixed $sport_id
     */
    public function setSportId($sport_id)
    {
        $this->sport_id = $sport_id;
    }

    /**
     * @return string
     */
    public function getSportName(): string
    {
        return $this->sport_name;
    }

    /**
     * @param string $sport_name
     */
    public function setSportName(string $sport_name)
    {
        $this->sport_name = $sport_name;
    }

    /**
     * @return bool
     */
    public function isMultisport(): bool
    {
        return $this->multisport;
    }

    /**
     * @param bool $multisport
     */
    public function setMultisport(bool $multisport)
    {
        $this->multisport = $multisport;
    }

    /**
     * @return string
     */
    public function getSportDesc(): string
    {
        return $this->sport_desc;
    }

    /**
     * @param string $sport_desc
     */
    public function setSportDesc(string $sport_desc)
    {
        $this->sport_desc = $sport_desc;
    }
}