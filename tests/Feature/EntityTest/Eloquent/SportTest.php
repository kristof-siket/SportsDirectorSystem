<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.11.07.
 * Time: 19:42
 */

namespace Tests\Unit\ModelTests\Eloquent;


use App\Sport;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class SportTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var Sport $sport
     */
    private $sport;

    /**
     * @test
     * @return void
     */
    public function sport_has_name()
    {
        $this->assertNotEmpty($this->sport->getSportName());
    }

    /**
     * @test
     * @return void
     */
    public function sport_has_description()
    {
        $this->assertNotEmpty($this->sport->getSportDesc());
    }

    /**
     * The reason why we have this requirement is the fact that the system currently does not support multi-sports.
     *
     * @test
     * @return void
     */
    public function sport_is_not_multi_sport()
    {
        $this->assertEquals($this->sport->isMultisport(), false);
    }

    protected function setUp()
    {
        parent::setUp();
        $this->sport = factory(Sport::class)->create();
    }

}