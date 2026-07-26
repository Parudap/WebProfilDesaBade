<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_access_dashboard_after_login(): void
    {
        $user = User::factory()->create([
            'name' => 'Admin Desa',
            'email' => 'admin@example.com',
            'password' => bcrypt('secret123'),
            'is_admin' => true,
        ]);

        $response = $this->post('/admin/login', [
            'email' => $user->email,
            'password' => 'secret123',
        ]);

        $response->assertRedirect('/admin/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    public function test_non_admin_user_cannot_access_dashboard(): void
    {
        $user = User::factory()->create([
            'name' => 'Viewer',
            'email' => 'viewer@example.com',
            'password' => bcrypt('secret123'),
            'is_admin' => false,
        ]);

        $this->actingAs($user);

        $response = $this->get('/admin/dashboard');

        $response->assertRedirect('/admin/login');
    }
}
