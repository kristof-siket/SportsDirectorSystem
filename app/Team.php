<?php

namespace App;

use App\ModelInterfaces\ITeam;
use App\ModelInterfaces\IUser;
use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $team_id
 * @property IUser[] $members
 * @property string team_name
 * @property string team_location
 */
class Team extends Model implements ITeam
{
    protected $primaryKey = 'team_id';

    protected $fillable = [
        'team_name',
        'team_location'
    ];

    public function members()
    {
        return $this->hasMany('App\User'); // this will work without specifying foreign key (convention: Team -> team_id)
    }

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
