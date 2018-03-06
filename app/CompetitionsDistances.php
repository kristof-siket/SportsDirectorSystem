<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompetitionsDistances extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'competition_id',
        'distance_id'
    ];

    public function competition()
    {
        return $this->belongsTo('App\Competition', 'competition_id');
    }

    public function distance()
    {
        return $this->belongsTo('App\Distance', 'distance_id');
    }

    // these two methods work without specifying foreign keys, because of the naming conventions
}
