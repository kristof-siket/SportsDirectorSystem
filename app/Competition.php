<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $fillable = [
        'comp_sport',
        'comp_promoter',
        'comp_name',
        'comp_date',
        'comp_location'
    ];

}
