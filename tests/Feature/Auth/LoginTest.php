<?php

namespace Tests\Feature\Auth;

use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

/**
 * Class LoginTest
 * @package Tests\Feature\Auth
 *
 * @group auth
 */
class LoginTest extends TestCase
{
    use RefreshDatabase;

    private const DEFAULT_PASSWORD = 'testPas123';

    protected bool $seed = true;

    private function model(): \Illuminate\Database\Eloquent\Model
    {
        return Employee::factory()->create([
            'position_id' => 1,
            'department_id' => 1,
            'office_id' => 1,
            'password' => Hash::make(self::DEFAULT_PASSWORD),
        ]);
    }

    public function test_logs_user_in_with_correct_credentials()
    {
        $employee = $this->model();

        $this->postJson(route('auth.login'), [
            'email' => $employee->email,
            'password' => self::DEFAULT_PASSWORD,
        ]);

        $this->assertAuthenticatedAs($employee);
    }

    public function test_not_login_user_with_wrong_password()
    {
        $employee = $this->model();

        $response = $this->from(route('auth.login'))
            ->postJson(route('auth.login'), [
                'email' => $employee->email,
                'password' => 'wrong-password',
            ]);

        $response->assertForbidden();
        $this->assertGuest();
    }

    public function test_not_login_if_user_doesnt_exist()
    {
        $response = $this->from(route('auth.login'))
            ->postJson(route('auth.login'), [
                'email' => 'doesnt-exist-email',
                'password' => 'wrong-password',
            ]);

        $response->assertUnprocessable();
        $this->assertGuest();
    }

    public function test_allows_user_to_logout()
    {
        $employee = $this->model();
        $this->be($employee);

        $this->postJson(route('auth.logout'));

        $this->assertGuest();
    }
}
