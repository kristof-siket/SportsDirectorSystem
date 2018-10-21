<?php

namespace App;

use App\ModelInterfaces\IAnalyzerResult;
use App\ModelInterfaces\IResult;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $aresult_id
 * @property IResult $result
 * @property int aresult_timestamp
 * @property float aresult_kilometers
 * @property float aresult_pulse
 */
class AnalyzerResult extends Model implements IAnalyzerResult
{
    protected $primaryKey = 'aresult_id';
    public $timestamps = false;

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

    /**
     * @return int
     */
    public function getAresultId(): int
    {
        return $this->aresult_id;
    }

    /**
     * @param int $aresult_id
     */
    public function setAresultId(int $aresult_id)
    {
        $this->aresult_id = $aresult_id;
    }

    /**
     * @return IResult
     */
    public function getAresultResult(): IResult
    {
        return $this->result;
    }

    /**
     * @param IResult $aresult_result
     */
    public function setAresultResult(IResult $aresult_result)
    {
        $this->result = $aresult_result;
    }

    /**
     * @return float
     */
    public function getAresultTimestamp(): float
    {
        return $this->aresult_timestamp;
    }

    /**
     * @param float $aresult_timestamp
     */
    public function setAresultTimestamp(float $aresult_timestamp)
    {
        $this->aresult_timestamp = $aresult_timestamp;
    }

    /**
     * @return float
     */
    public function getAresultKilometers(): float
    {
        return $this->aresult_kilometers;
    }

    /**
     * @param float $aresult_kilometers
     */
    public function setAresultKilometers(float $aresult_kilometers)
    {
        $this->aresult_kilometers = $aresult_kilometers;
    }

    /**
     * @return float
     */
    public function getAresultPulse(): float
    {
        return $this->aresult_pulse;
    }

    /**
     * @param float $aresult_pulse
     */
    public function setAresultPulse(float $aresult_pulse)
    {
        $this->aresult_pulse = $aresult_pulse;
    }
}
