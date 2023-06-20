<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    protected $seed = true;

    protected function setUp(): void
    {
        parent::setUp();
        // $this->withoutExceptionHandling();
    }

    protected function login(User $user = null)
    {
        $user = $user ?? User::find(1);
        $this->actingAs($user);
    }
}
