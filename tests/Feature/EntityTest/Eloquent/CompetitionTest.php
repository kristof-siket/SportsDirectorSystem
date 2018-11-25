<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.11.07.
 * Time: 15:42
 */

namespace Tests\Unit\ModelTests\Eloquent;

use App\Competition;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CompetitionTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var $competition Competition
     */
    private $competition;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->competition = factory(Competition::class)->create();
    }

    /**
     * @test
     * @return void
     */
    public function competition_has_sport()
    {
        $this->assertNotEmpty($this->competition->getCompSport());
    }

    /**
     * @test
     * @return void
     */
    public function competition_has_promoter()
    {
        $this->assertNotEmpty($this->competition->getCompPromoter());
    }

    /**
     * @test
     * @return void
     */
    public function competition_has_name()
    {
        $this->assertNotEmpty($this->competition->getCompName());
    }

    /**
     * @test
     * @return void
     */
    public function competition_has_date()
    {
        $this->assertNotEmpty($this->competition->getCompDate());
    }
}