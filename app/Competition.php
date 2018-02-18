<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $primaryKey = 'comp_id';

    protected $fillable = [
        'comp_sport',
        'comp_promoter',
        'comp_name',
        'comp_date',
        'comp_location'
    ];


    public function sport()
    {
        return $this->belongsTo('App\Sport', 'comp_sport');
    }

    public function promoter()
    {
        return $this->belongsTo('App\User', 'comp_promoter');
    }

    public function results()
    {
        return $this->hasMany('App\Result', 'result_competition');
    }

    public function distances()
    {
        return $this->hasMany('App\CompetitionsDistances', 'competition_id');
    }
}
