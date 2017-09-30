<?php
/**
 * Created by PhpStorm.
 * User: Irvv
 * Date: 09/09/17
 * Time: 1:17 PM
 */

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;




class UsersTest extends TestCase
{
    use DatabaseTransactions;
    use InteractsWithDatabase;

    public function testCanSeeUserPage()
    {
        //Arrange  - Preparacion
        $user = factory(User::class)->create();

        //Act - Accion
        $response =$this->get($user->username);

        //Assert - Verificacion
        $response->assertSee($user->name);
    }

    public function testCanLogin()
    {
        $user = factory(User::class)->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'secret',
        ]);

        $this->assertAuthenticatedAs($user);
    }

    public function testCanFollow()
    {
        $user = factory(User::class)->create();

        $other_user = factory(User::class)->create();

        $response = $this->actingAs($user)->post($other_user->username.'/follow');

        $this->assertDatabaseHas('followers',[
            'user_id' =>$user->id,
            'followed_id' =>$other_user->id
        ]);

    }
}