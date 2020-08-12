<?php

namespace Tests\Feature;

use App\ApplicationModel;
use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\UserAppKeysController;
use App\User;
use App\UserAppKeyModel;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ControllerTest extends TestCase
{
    use RefreshDatabase;

//    /** @test */

//    /** @test */
//    public function application_is_created(){
////        $application = factory(ApplicationModel::class)->create();
////        $userappkey = factory(UserAppKeysController::class)->create();
////        $users = factory(User::class)->create();
////
////        $this->assertTrue($application->isNotEmpty());
////        dd($application);
//////        dd($users);
//    }

    /** @test */
    public function if_users_is_connected_then_list_applications(){
        $this->actingAs(factory(User::class)->create());

        $response = $this->get('/userappkeys')
            ->assertOk();
    }

    /** @test */
    public function userappkey_is_created()
    {
//        $this->withoutExceptionHandling();

        $this->actingAs(factory(User::class)->create());

        $response = $this->post('/userappkeys',[
            'key' => 'TestKey',
            'email' => 'testingemail@testing',
            'type' =>  'admin',
            'app_id' => 'TEST'
        ]);

        $this->assertCount(1,UserAppKeyModel::all());

    }


    /**
     * A basic feature test example.
     *
     * @return void
     */
//    public function testExample()
//    {
//        $response = $this->get('/');
//
//        $response->assertStatus(200);
//    }

}
