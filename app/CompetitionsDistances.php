<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompetitionsDistances extends Model
{
    protected $fillable = [
        'competition_id',
        'distance_id'
    ];
}
