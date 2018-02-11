<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'result_athlete',
        'result_distance',
        'result_sport',
        'result_multisport',
        'result_competition',
        'disqualified',
        'result_time'
    ];

    public function athlete()
    {
        return $this->belongsTo('App\User', 'result_athlete');
    }

    public function distance()
    {
        return $this->belongsTo('App\Distance', 'result_distance');
    }

    public function sport()
    {
        return $this->belongsTo('App\Sport', 'result_sport');
    }

    public function multisport()
    {
        return $this->belongsTo('App\Sport', 'result_multisport');
    }

    public function competition()
    {
        return $this->belongsTo('App\Competition', 'result_competition');
    }
}
