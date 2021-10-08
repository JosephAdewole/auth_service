<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class Auth_loginTest extends TestCase
{
    public function bothEmailAndPasswordpresent()
    {
        $this->json('POST', 'api/login')
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    'email' => ["The email field is required."],
                    'password' => ["The password field is required."],
                ]
            ]);
    }

    public function testSuccessfulLogin()
    {

        $user_data = [
            "name" => "James22112",
            "email" => "jknnmlj@gmail.com",
            "password" => "james114#",
            "password_confirmation" => "james114#"
        ];

        $this->json('POST', 'api/register', $user_data, ['Accept' => 'application/json'])
            ->assertStatus(200);


        $loginData = ['email' => 'jknnmlj@gmail.com', 'password' => 'james114#', "password_confirmation" => "james114#"
    ];

        $this->json('POST', 'api/login', $loginData, ['Accept' => 'application/json'])
            ->assertStatus(200);

    }
}