<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * Test if login failed.
     *
     * @return void
     */
    public function testLoginFailed()
    {

        $this->visit('/auth/login')
            ->type('blabla@gmail.com', 'email')
            ->type('djscrave', 'password')
            ->press('Connexion')
            ->followRedirects()
            ->see('Email')
            ->see('Password');
    }

    /**
     * Test if registration failed
     *
     * @return void
     */
    public function testRegisterFailed()
    {

        $this->visit('/auth/register')
            ->type('Julien', 'firstname')
            ->type('Boyer', 'lastname')
            ->type('julien@meetserious.com', 'email')
            ->type('123456', 'password')
            ->type('1234567', 'password_confirmation')
            ->press("Enregistrer")
            ->followRedirects()
            ->see('La confirmation ne correspond pas au mot de passe')
            ->type('Julien', 'firstname')
            ->type('Boyer', 'lastname')
            ->type('admin@admin.fr', 'email')
            ->type('123456', 'password')
            ->type('123456', 'password_confirmation')
            ->press("Enregistrer")
            ->followRedirects()
            ->see('Cette adresse email est déjà utilisée');
    }

    /**
     * Test if registration success
     *
     * @return void
     */
    public function testRegisterSuccess()
    {
        $this->erase();

        $this->visit('/auth/register')
            ->type('Julien', 'firstname')
            ->type('Boyer', 'lastname')
            ->type('julien@meetserious.com', 'email')
            ->type('123456', 'password')
            ->type('123456', 'password_confirmation')
            ->press("Enregistrer")
            ->followRedirects()
            ->seePageIs('/admin');
    }



    /**
     * Test if registration success
     *
     * @return void
     */
    public function testRegisterAdvancedSuccess()
    {

        $this->visit('/auth/register')
            ->type('Julien', 'firstname')
            ->type('Boyer', 'lastname')
            ->type('julien2@meetserious.com', 'email')
            ->type('123456', 'password')
            ->type('123456', 'password_confirmation')
            ->type('Petite description courte...', 'description')
            ->type('https://remixcv-cache.s3-eu-west-1.amazonaws.com/user_thumbnail/1374393875-f175462adf69e6f654469146f8f7ac36.jpeg', 'photo')
            ->press("Enregistrer")
            ->followRedirects()
            ->seePageIs('/admin');
    }

    protected function erase(){
        $user = \App\User::where('email', 'julien@meetserious.com')->first();
        if($user){
            $user->delete();
        }
        $user = \App\User::where('email', 'julien2@meetserious.com')->first();
        if($user){
            $user->delete();
        }
    }

        /**
         * Test if registration success
         *
         * @return void
         */
        public function testLoginSuccess()
        {

            $this->visit('/auth/login')
                ->type('julien@meetserious.com', 'email')
                ->type('123456', 'password')
                ->press('Connexion')
                ->followRedirects()
                ->seePageIs('/admin');
        }

    /**
     * Test if registration success
     *
     * @return void
     */
    public function testLogoutSuccess()
    {

        $this->testLoginSuccess();
        $this->click('Deconnexion')
            ->followRedirects()
            ->seePageIs('/auth/login');
    }

    /**
     * Test existing database
     * @return void
     */
    public function testExtistingDatabaseAndMongo()
    {

        $this->seeInDatabase('administrators', ['email' => 'julien@meetserious.com']);
        $this->seeInDatabase('administrators', ['email' => 'julien2@meetserious.com']);

        $connection = \Illuminate\Support\Facades\DB::connection('mongodb');
        $this->assertInstanceOf('Jenssegers\Mongodb\Connection', $connection);

        $dbs = DB::connection('mongodb')->listCollections();
        $this->assertTrue(is_array($dbs));

        $collection = DB::connection('mongodb')->getCollection('notifications');
        $this->assertInstanceOf('Jenssegers\Mongodb\Collection', $collection);

        $dbs = DB::connection('mongodb')->listCollections();
        $this->assertTrue(is_array($dbs));

        \App\Model\Notifications::where('user.email', '=' ,'julien@meetserious.com')->firstOrFail();

    }




}
