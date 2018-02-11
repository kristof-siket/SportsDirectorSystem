<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'team_name',
        'team_location'
    ];

    public function members()
    {
        return $this->hasMany('App\User'); // this will work without specifying foreign key (convention: Team -> team_id)
    }
}
