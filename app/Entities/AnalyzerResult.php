<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018.04.30.
 * Time: 10:48
 */

namespace App\Entities;


use App\ModelInterfaces\IAnalyzerResult;
use App\ModelInterfaces\IResult;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="analyzer_results")
 */
class AnalyzerResult implements IAnalyzerResult
{
    /**
     * @var int $aresult_id
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $aresult_id;

    /**
     * @var Result $aresult_result
     * @ORM\ManyToOne(targetEntity="Result")
     * @ORM\JoinColumn(name="aresult_result", referencedColumnName="result_id")
     */
    protected $aresult_result;

    /**
     * @var double $aresult_timestamp
     * @ORM\Column(type="float")
     */
    protected $aresult_timestamp;

    /**
     * @var double $aresult_kilometers
     * @ORM\Column(type="float")
     */
    protected $aresult_kilometers;

    /**
     * @var double $aresult_pulse
     * @ORM\Column(type="float")
     */
    protected $aresult_pulse;

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
        return $this->aresult_result;
    }

    /**
     * @param IResult $aresult_result
     */
    public function setAresultResult(IResult $aresult_result)
    {
        $this->aresult_result = $aresult_result;
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