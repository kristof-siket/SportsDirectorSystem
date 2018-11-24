<?php

namespace Tests\Browser;

use App\ModelInterfaces\IUser;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginBrowserTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Login page loaded test.
     *
     * @return void
     * @throws \Exception
     * @throws \Throwable
     */
    public function test_login_index()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Login');
        });
    }

    /**
     * Login page loaded test.
     *
     * @return void
     * @throws \Exception
     * @throws \Throwable
     */
    public function test_login_user()
    {
        /**
         * @var $tempuser IUser
         */
        $tempuser = factory(User::class)->create();

        $this->browse(function (Browser $browser) use ($tempuser) {
            $browser->visit('/')
                ->type('email', $tempuser->getEmail())
                ->type('password', 'secret')
                ->press('Login')
                ->assertPathIs('/dashboard');
        });
    }
}
