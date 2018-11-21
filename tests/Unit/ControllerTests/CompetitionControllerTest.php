<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.11.21.
 * Time: 9:28
 */

namespace Tests\Unit\ControllerTests;

use App\Competition;
use App\User;
use Faker;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompetitionControllerTest extends TestCase
{
    use RefreshDatabase;

    private $competitionFake;
    private $user;
    private $allComps;

    /**
     * @var $faker Faker\Generator
     */
    private $faker;

    protected function setUp()
    {
        parent::setUp();
        $this->faker = Faker\Factory::create();

        // Create the mock objects
        $this->user = \Mockery::mock(User::class);
        $this->allComps = new Collection();
        for ($i = 0; $i < 10; $i++) {
            $this->allComps->add(new Competition(['comp_id' => ++$i,
                'comp_name' => $this->faker->unique()->company,
                'comp_date' => "2018-11-07 17:25:41"]));

        }

        $this->user->shouldReceive('getAuthIdentifier')
            ->andReturn(1);

        $this->competitionFake = \Mockery::mock(Competition::class);

        // Resolve every Competition params with this fake
        $this->app->instance(Competition::class, $this->competitionFake);
    }

//    /**
//     * @return void
//     * @test
//     */
//    public function test_competition_index()
//    {
//        // Mock the Crud Service.
//        $fakeCrud = \Mockery::mock(ICrudService::class);
//
//        // Register the fake Crud Service to DI container.
//        $this->app->instance(ICrudService::class, $fakeCrud);
//
//        // Mock GetALllCompetitions method to return the fake collection.
//        $fakeCrud->shouldReceive('GetAllCompetitions')
//            ->once()
//            ->andReturn
//            ($this->allComps);
//
//        // Authenticate the mock user.
//        $this->be($this->user);
//
//        // Send the request to the route, and assert if the view has competitions array.
//        $this->actingAs($this->user)->get('competitions')->assertStatus(200);
//    }
}

