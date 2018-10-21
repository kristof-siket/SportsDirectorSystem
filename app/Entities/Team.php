<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.04.30.
 * Time: 10:51
 */

namespace App\Entities;


use App\ModelInterfaces\ITeam;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="teams")
 */
class Team implements ITeam
{
    /**
     * @var int $team_id
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $team_id;

    /**
     * @var string $team_name
     * @ORM\Column(type="string")
     */
    protected $team_name;

    /**
     * @var string $team_location
     * @ORM\Column(type="string")
     */
    protected $team_location;

    /**
     * @return int
     */
    public function getTeamId(): int
    {
        return $this->team_id;
    }

    /**
     * @param int $team_id
     */
    public function setTeamId(int $team_id)
    {
        $this->team_id = $team_id;
    }

    /**
     * @return string
     */
    public function getTeamName(): string
    {
        return $this->team_name;
    }

    /**
     * @param string $team_name
     */
    public function setTeamName(string $team_name)
    {
        $this->team_name = $team_name;
    }

    /**
     * @return string
     */
    public function getTeamLocation(): string
    {
        return $this->team_location;
    }

    /**
     * @param string $team_location
     */
    public function setTeamLocation(string $team_location)
    {
        $this->team_location = $team_location;
    }
}