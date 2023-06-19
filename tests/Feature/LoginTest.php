<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    public function test_RequiresEmailAndLogin()
    {
        $this->json('POST', 'api/login')
            ->assertStatus(401)
            ->assertJson([
                'message' => 'Something went wrong',
            ]);
    }


    public function test_UserLoginsSuccessfully()
    {
        // $user = User::factory()->create();

        $payload = ['email' => 'admin@test.com', 'password' => 'toptal'];

        $this->json('POST', 'api/login', $payload)
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'name',
                'email',
                'email_verified_at',
                'api_token',
                'created_at',
                'updated_at',
            ]);

    }
}
