<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.10.17.
 * Time: 17:32
 */

namespace App\ModelInterfaces;


interface IAnalyzerResult
{
    /**
     * @return int
     */
    public function getAresultId(): int;

    /**
     * @param int $aresult_id
     */
    public function setAresultId(int $aresult_id);

    /**
     * @return IResult
     */
    public function getAresultResult(): IResult;

    /**
     * @param IResult $aresult_result
     */
    public function setAresultResult(IResult $aresult_result);

    /**
     * @return float
     */
    public function getAresultTimestamp(): float;

    /**
     * @param float $aresult_timestamp
     */
    public function setAresultTimestamp(float $aresult_timestamp);

    /**
     * @return float
     */
    public function getAresultKilometers(): float;

    /**
     * @param float $aresult_kilometers
     */
    public function setAresultKilometers(float $aresult_kilometers);

    /**
     * @return float
     */
    public function getAresultPulse(): float;

    /**
     * @param float $aresult_pulse
     */
    public function setAresultPulse(float $aresult_pulse);
}