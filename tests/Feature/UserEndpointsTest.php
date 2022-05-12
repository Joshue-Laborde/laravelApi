<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class UserEndpointsTest extends TestCase
{
    use WithFaker;

    public function test_user_endpoint(){
        $headers = [
            'Authorization'=> config('test.token')
           /*  'Content-Type'=> 'application/json',
            'Accept'=>'application/json' */ // ya vienen en el metodo de json, con ls variables headers
        ];

        $payload = [];

        $this->json('GET', '/api/user/index', $payload, $headers)
            ->assertStatus(200) ;
    }

    public function test_user_create_endpoint(){
        $headers = [
            'Authorization'=> config('test.token')
        ];

        $payload = [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'password_confirmation'=> '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ];

        $this->json('POST', '/api/user/create', $payload, $headers)
            ->assertStatus(201) ;
    }

    public function test_user_show_endpoint(){

        $user = User::first();

        $headers = [
            'Authorization'=> config('test.token')
        ];

        $payload = [
            'user_id'=> $user->id
        ];

        $this->json('POST', '/api/user/show', $payload, $headers)
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'name',
                'email',
                'email_verified_at',
                'created_at',
                'updated_at'
            ]) ;
    }
}
