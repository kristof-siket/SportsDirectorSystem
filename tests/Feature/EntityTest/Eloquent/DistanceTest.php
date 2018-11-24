<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.11.07.
 * Time: 19:26
 */

namespace Tests\Unit\ModelTests\Eloquent;


use App\Distance;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class DistanceTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var $distance Distance
     */
    private $distance;

    /**
     * @test
     * @return void
     */
    public function distance_has_name()
    {
        $this->assertNotEmpty($this->distance->getDistanceName());
    }

    /**
     * @test
     * @return void
     */
    public function distance_has_kilometers()
    {
        $this->assertNotEmpty($this->distance->getDistanceKilometers());
    }

    /**
     * @test
     * @return void
     */
    public function distance_has_sport()
    {
        $this->assertNotEmpty($this->distance->getDistanceSport());
    }

    protected function setUp()
    {
        parent::setUp();
        $this->distance = factory(Distance::class)->create();
    }

}