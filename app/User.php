<?php

namespace App;

use App\ModelInterfaces\IResult;
use App\ModelInterfaces\ITeam;
use App\ModelInterfaces\ITrainingPlan;
use App\ModelInterfaces\IUser;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property ITeam $team
 * @property IResult[] $results
 * @property ITrainingPlan[] $trainingplans
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property string password
 * @property \DateTime date_of_birth
 * @property string location
 */
class User extends Authenticatable implements IUser
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'team_id',
        'date_of_birth',
        'location'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function team()
    {
        return $this->belongsTo('App\Team'); // it works -> naming convention!
    }

    public function results()
    {
        return $this->hasMany('App/Result', 'result_athlete');
    }

    public function trainingplans()
    {
        return $this->hasMany('App/TrainingPlan', 'tp_creator');
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
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
        return $this->getAuthPassword();
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return ITeam
     */
    public function getTeam(): ITeam
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
