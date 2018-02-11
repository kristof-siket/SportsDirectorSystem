<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompetitionsDistances extends Model
{
    protected $fillable = [
        'competition_id',
        'distance_id'
    ];

    public function competition()
    {
        return $this->belongsTo('App\Competition');
    }

    public function distance()
    {
        return $this->belongsTo('App\Distance');
    }

    // these two methods work without specifying foreign keys, because of the naming conventions
}
