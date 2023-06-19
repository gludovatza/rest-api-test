<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    public function test_RegistersSuccessfully()
    {
        $payload = [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => 'toptal123',
            'password_confirmation' => 'toptal123'
        ];

        $this->json('post', '/api/register', $payload)
            ->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'name',
                'email',
                'created_at',
                'updated_at',
            ]);
    }

    public function test_RequiresPasswordEmailAndName()
    {
        $this->json('post', '/api/register')
            ->assertStatus(500);
    }

    // public function test_RequirePasswordConfirmation()
    // {
    //     $payload = [
    //         'name' => fake()->name,
    //         'email' => fake()->email,
    //         'password' => fake()->word,
    //     ];

    //     $this->json('post', '/api/register', $payload)
    //         ->assertStatus(422)
    //         ->assertJson([
    //             'password' => ['The password confirmation does not match.'],
    //         ]);
    // }
}
