<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VmmTest extends TestCase
{
    use RefreshDatabase;

    /*
    |--------------------------------------------------------------------------
    | AUTH TEST
    |--------------------------------------------------------------------------
    */

    /** @test */
    public function user_can_register_successfully()
    {
        $response = $this->post('/register', [
            'name' => 'Partho',
            'email' => 'partho@test.com',
            'password' => 'password'
        ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('users', [
            'email' => 'partho@test.com'
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD TEST
    |--------------------------------------------------------------------------
    */

    /** @test */
    public function dashboard_requires_authentication()
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
    }

    /** @test */
    public function authenticated_user_can_access_dashboard()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
    }

    /*
    |--------------------------------------------------------------------------
    | MINING MACHINE TEST
    |--------------------------------------------------------------------------
    */

    /** @test */
    public function mining_machine_page_loads()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/machines');

        $response->assertStatus(200);
    }

    /** @test */
    public function user_can_create_mining_machine()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/machines', [
            'name' => 'Basic Miner',
            'power' => 100,
            'status' => 'active'
        ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('machines', [
            'name' => 'Basic Miner'
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | EARNINGS TEST
    |--------------------------------------------------------------------------
    */

    /** @test */
    public function earnings_page_loads_for_user()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/earnings');

        $response->assertStatus(200);
    }
}