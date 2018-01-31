<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distance extends Model
{
    protected $fillable = [
        'distance_sport',
        'multi_id',
        'distance_name',
        'distance_kilometers'
    ];
}
