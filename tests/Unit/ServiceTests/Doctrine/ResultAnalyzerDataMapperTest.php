<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.11.11.
 * Time: 12:09
 */

namespace Tests\Unit\ServiceTests\Doctrine;


use App\Services\Interfaces\IResultAnalyzer;
use App\Services\Interfaces\ResultAnalyzerDataMapper;
use App\Services\Repository\Result\ResultRepoDoctrine;
use App\Services\ResultAnalyzerActiveRecord;
use Tests\TestCase;

class ResultAnalyzerDataMapperTest extends TestCase
{
    /**
     * @var IResultAnalyzer $resultAnalyzerHelper
     */
    private $resultAnalyzerHelper;

    /**
     * @var IResultAnalyzer $resultAnalyzerService
     */
    private $resultAnalyzerService;

    /**
     * @return void
     * @test
     */
    public function test_get_result_repo_returns_repo()
    {
        // setup (auto)
        // act
        $resultRepo = $this->resultAnalyzerService->getResultRepository();

        // assert
        $this->assertTrue($resultRepo instanceof ResultRepoDoctrine);
    }

    protected function setUp()
    {
        parent::setUp();
        // We use Eloquent implementation for initialization only as it is not implemented on Doctrine.
        $this->resultAnalyzerHelper = $this->getMockBuilder(ResultAnalyzerActiveRecord::class)
            ->setMethods(['initializeAnalyzerResults'])
            ->getMock();
        $this->resultAnalyzerService = $this->getMockBuilder(ResultAnalyzerDataMapper::class)
            ->setMethods(null)
            ->setConstructorArgs([app('em')])
            ->getMock();
    }
}