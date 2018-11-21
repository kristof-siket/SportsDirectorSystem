<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.11.11.
 * Time: 20:25
 */

namespace Tests\Feature\Controller;


use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CompetitionControllerTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var User
     */
    private $user;

    /**
     * @return void
     * @test
     */
    public function test_index_guest_sees_login()
    {
        $this->get('competitions')->assertRedirect('login');
    }

    /**
     * @return void
     * @test
     */
    public function test_create_guest_sees_login()
    {
        $this->get('competitions/create')->assertRedirect('login');
    }

    /**
     * @return void
     * @test
     */
    public function test_competition_index()
    {
        $this->actingAs($this->user)->call('GET', 'competitions')->assertViewHas('competitions');
    }

    /**
     * @return void
     * @test
     */
    public function test_competition_create()
    {
        $this->actingAs($this->user)->call('GET', 'competitions/create')->assertStatus(200);
    }

    /**
     * @return void
     * @test
     */
    public function test_competition_store()
    {

        $testDate = Carbon::create(2018, 6, 18, 12);
        Carbon::setTestNow($testDate);

        $this->actingAs($this->user)->call('POST', 'competitions',
            ['comp_name' => 'Smthng', 'comp_sport' => 1, 'comp_date' => $testDate->format('Y-m-d H:i:s'), 'comp_location' => "London"]
        );

        $this->assertDatabaseHas('competitions',
            [
                'comp_id' => 1,
                'comp_name' => 'Smthng',
                'comp_location' => 'London',
                'comp_date' => $testDate->format('Y-m-d H:i:s'),
                'comp_promoter' => $this->user->getId(),
                'comp_sport' => 1,
                'created_at' => $testDate->format('Y-m-d H:i:s'),
                'updated_at' => $testDate->format('Y-m-d H:i:s'),
            ]);
    }

    protected function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }
}