<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.04.30.
 * Time: 10:50
 */

namespace App\Entities;


use App\ModelInterfaces\ITeam;
use App\ModelInterfaces\IUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User implements IUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var string $first_name
     * @ORM\Column(type="string")
     */
    protected $first_name;

    /**
     * @var string $last_name
     * @ORM\Column(type="string")
     */
    protected $last_name;

    /**
     * @var string $email
     * @ORM\Column(type="string")
     */
    protected $email;

    /**
     * @var string $password
     * @ORM\Column(type="string")
     */
    protected $password;

    /**
     * @var Team $team
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumn(name="team_id", referencedColumnName="team_id")
     */
    protected $team;

    /**
     * @var \DateTime $date_of_birth
     * @ORM\Column(type="date")
     */
    protected $date_of_birth;

    /**
     * @var string $location
     * @ORM\Column(type="string")
     */
    protected $location;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName(string $first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName(string $last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getTeam(): ?ITeam
    {
        return $this->team;
    }

    /**
     * @param ITeam $team
     */
    public function setTeam(ITeam $team)
    {
        $this->team = $team;
    }

    /**
     * @return \DateTime
     */
    public function getDateOfBirth(): \DateTime
    {
        return $this->date_of_birth;
    }

    /**
     * @param \DateTime $date_of_birth
     */
    public function setDateOfBirth(\DateTime $date_of_birth)
    {
        $this->date_of_birth = $date_of_birth;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param string $location
     */
    public function setLocation(string $location)
    {
        $this->location = $location;
    }


}