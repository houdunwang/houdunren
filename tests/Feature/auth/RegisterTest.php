<?php

namespace Tests\Feature\auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use WithFaker;

    /**
     * 用户名注册
     * @test
     */
    public function UserNameRegistered()
    {
        $response = $this->postJson('/api/auth/register', [
            "account" => $this->faker->word(),
            'password' => 'admin888',
            'password_confirmation' => 'admin888'
        ]);
        $response->assertOk()->assertJson(['token' => true]);
    }

    /**
     * 用户名重名不能注册
     * @test
     */
    public function nameRepetitionCantRegister()
    {
        $account = 'houdunren';
        $this->postJson('/api/auth/register', [
            "account" => $account,
            'password' => 'admin888',
            'password_confirmation' => 'admin888'
        ]);
        $response = $this->postJson('/api/auth/register', [
            "account" => $account,
            'password' => 'admin888',
            'password_confirmation' => 'admin888'
        ]);

        $response->assertInvalid(['account']);
    }

    /**
     * 两次密码不一致
     * @test
     */
    public function twoPasswordsDontMatch()
    {
        $response = $this->postJson('/api/auth/register', [
            "account" => 'houdunren',
            'password' => 'admin888',
            'password_confirmation' => 'admin'
        ]);

        $response->assertInvalid(['password']);
    }
}
