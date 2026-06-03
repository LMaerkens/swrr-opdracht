<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the login page renders successfully.
     *
     * @return void
     */
    public function test_login_page_renders_successfully()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('Inloggen');
    }

    /**
     * Test guest users are redirected from home/dashboard.
     *
     * @return void
     */
    public function test_unauthenticated_user_redirected_from_home()
    {
        $response = $this->get('/home');

        $response->assertRedirect('/login');
    }

    /**
     * Test authenticated users cannot access login or register page.
     *
     * @return void
     */
    public function test_authenticated_user_redirected_from_login_and_register()
    {
        $user = User::factory()->create();

        $responseLogin = $this->actingAs($user)->get('/login');
        $responseLogin->assertRedirect('/home');

        $responseRegister = $this->actingAs($user)->get('/');
        $responseRegister->assertRedirect('/home');
    }

    /**
     * Test login works with correct credentials.
     *
     * @return void
     */
    public function test_user_can_login_with_correct_credentials()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('secret-password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'secret-password',
        ]);

        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Test login fails with incorrect credentials.
     *
     * @return void
     */
    public function test_user_cannot_login_with_incorrect_credentials()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('secret-password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    /**
     * Test user can log out successfully.
     *
     * @return void
     */
    public function test_user_can_logout()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $response->assertRedirect('/login');
        $this->assertGuest();
    }
}
