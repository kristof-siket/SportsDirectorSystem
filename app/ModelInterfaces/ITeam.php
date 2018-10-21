<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.10.17.
 * Time: 17:36
 */

namespace App\ModelInterfaces;


interface ITeam
{
    /**
     * @return int
     */
    public function getTeamId(): int;

    /**
     * @param int $team_id
     */
    public function setTeamId(int $team_id);

    /**
     * @return string
     */
    public function getTeamName(): string;

    /**
     * @param string $team_name
     */
    public function setTeamName(string $team_name);

    /**
     * @return string
     */
    public function getTeamLocation(): string;

    /**
     * @param string $team_location
     */
    public function setTeamLocation(string $team_location);
}