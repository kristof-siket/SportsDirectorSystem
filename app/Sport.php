<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    protected $fillable = [
            'sport_name',
            'multisport',
            'sport_desc'
    ];
}
