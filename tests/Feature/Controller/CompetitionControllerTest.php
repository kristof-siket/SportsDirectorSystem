<?php
/**
 * Created by PhpStorm.
 * User: Kristóf
 * Date: 2018.11.11.
 * Time: 20:25
 */

namespace Tests\Feature\Controller;


use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CompetitionControllerTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    /**
     * @var User
     */
    private $user;

    /**
     * @group controller
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
}