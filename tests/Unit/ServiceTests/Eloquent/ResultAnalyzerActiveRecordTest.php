<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.11.11.
 * Time: 10:33
 */

namespace Tests\Unit\ServiceTests\Eloquent;


use App\Result;
use App\Services\Interfaces\IResultAnalyzer;
use App\Services\Repository\Result\ResultRepoEloquent;
use App\Services\ResultAnalyzerActiveRecord;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ResultAnalyzerActiveRecordTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var $analyzerService IResultAnalyzer
     */
    private $analyzerService;

    /**
     * @return void
     * @test
     */
    public function test_get_result_repo_returns_repo()
    {
        // setup (auto)
        // act
        $resultRepo = $this->analyzerService->getResultRepository();

        // assert
        $this->assertTrue($resultRepo instanceof ResultRepoEloquent);
    }

    /**
     * @return void
     * @test
     */
    public function get_statistics_returns_complete_array()
    {
        // ARRANGE
        $result = factory(Result::class)->create();
        $this->analyzerService->initializeAnalyzerResults(1, $result);

        //ACT
        $statistics = $this->analyzerService->getStatistics($result);

        //ASSERT
        $this->assertTrue(is_array($statistics) &&
            array_key_exists("avg_pulse", $statistics) &&
            array_key_exists("avg_tempo", $statistics) &&
            array_key_exists("max_pulse", $statistics) &&
            array_key_exists("max_tempo", $statistics)
        );
    }

    protected function setUp()
    {
        parent::setUp();

        // Initialize the Active Record implementation of ResultAnalyzer service.
        $this->analyzerService = $this->getMockBuilder(ResultAnalyzerActiveRecord::class)
            ->setMethods(null)
            ->getMock();
    }
}