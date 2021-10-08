<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class Auth_registrationTest extends TestCase
{
    public function testRequiredFieldsForRegistration()
    {
        $this->json('POST', 'api/register', ['Accept' => 'application/json'])
            ->assertStatus(422);
    }


    public function testRegistrationSuccess()
    {
        $user_data = [
            "name" => "James22",
            "email" => "khnlklj@gmail.com",
            "password" => "james114#",
            "password_confirmation" => "james114#"
        ];

        $this->json('POST', 'api/register', $user_data, ['Accept' => 'application/json'])
            ->assertStatus(200);
    }
}