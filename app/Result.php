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
}
