<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnalyzerResult extends Model
{
    protected $primaryKey = 'aresult_id';

    protected $fillable = [
        'aresult_result',
        'aresult_timestamp',
        'aresult_kilometers',
        'aresult_pulse'
    ];

    public function result()
    {
        return $this->belongsTo('App\Result', 'aresult_result');
    }
}
