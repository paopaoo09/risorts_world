<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_to_login(): void
    {
        $this->get('/admin/dashboard')->assertRedirect('/login');
        $this->get('/employee/dashboard')->assertRedirect('/login');
        $this->get('/customer/dashboard')->assertRedirect('/login');
    }

    public function test_dashboard_redirects_to_the_users_role_dashboard(): void
    {
        $this->actingAs(User::factory()->admin()->create())
            ->get('/dashboard')->assertRedirect(route('admin.dashboard'));

        $this->actingAs(User::factory()->employee()->create())
            ->get('/dashboard')->assertRedirect(route('employee.dashboard'));

        $this->actingAs(User::factory()->create())
            ->get('/dashboard')->assertRedirect(route('customer.dashboard'));
    }

    public function test_admin_can_access_admin_and_employee_areas_only(): void
    {
        $this->actingAs(User::factory()->admin()->create());

        $this->get('/admin/dashboard')->assertOk();
        $this->get('/employee/dashboard')->assertOk();
        $this->get('/customer/dashboard')->assertForbidden();
    }

    public function test_employee_can_access_employee_area_only(): void
    {
        $this->actingAs(User::factory()->employee()->create());

        $this->get('/employee/dashboard')->assertOk();
        $this->get('/admin/dashboard')->assertForbidden();
        $this->get('/customer/dashboard')->assertForbidden();
    }

    public function test_customer_can_access_customer_area_only(): void
    {
        $this->actingAs(User::factory()->create());

        $this->get('/customer/dashboard')->assertOk();
        $this->get('/admin/dashboard')->assertForbidden();
        $this->get('/employee/dashboard')->assertForbidden();
    }

    public function test_registered_users_are_customers(): void
    {
        $this->post('/register', [
            'full_name' => 'New Guest',
            'username' => 'newguest',
            'email' => 'guest@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'role' => User::ROLE_ADMIN,
        ]);

        $this->assertSame(User::ROLE_CUSTOMER, User::where('email', 'guest@example.com')->first()->role);
    }
}
