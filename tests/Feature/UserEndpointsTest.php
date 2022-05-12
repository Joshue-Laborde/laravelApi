<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserEndpointsTest extends TestCase
{
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
}
