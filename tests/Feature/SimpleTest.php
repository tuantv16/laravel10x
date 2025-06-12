<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SimpleTest extends TestCase
{
    public function test_homepage_returns_success()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
