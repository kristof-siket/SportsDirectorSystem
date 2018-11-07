<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.11.07.
 * Time: 17:28
 */

namespace Tests\Unit\ModelTests\Eloquent;

use App\Result;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ResultTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var $result Result
     */
    private $result;

    /**
     * @test
     * @return void
     */
    public function result_has_competition()
    {
        $this->assertNotEmpty($this->result->getResultCompetition());
    }

    /**
     * @test
     * @return void
     */
    public function result_has_distance()
    {
        $this->assertNotEmpty($this->result->getResultDistance());
    }

    /**
     * @test
     * @return void
     */
    public function result_has_athlete()
    {
        $this->assertNotEmpty($this->result->getResultAthlete());
    }

    /**
     * @test
     * @return void
     */
    public function result_has_sport()
    {
        $this->assertNotEmpty($this->result->getResultSport());
    }

    /**
     * @test
     * @return void
     */
    public function result_has_time()
    {
        $this->assertNotEmpty($this->result->getResultTime());
    }

    protected function setUp()
    {
        parent::setUp();

        $this->result = factory(Result::class)->create();
    }
}