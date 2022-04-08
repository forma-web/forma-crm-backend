<?php

namespace App\Models;

use App\Enums\DeviceEnum;
use App\Enums\SexEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\NewAccessToken;

class Employee extends Authenticatable
{
    use HasFactory, HasApiTokens;

    /**
     * @var string[]
     */
    protected $fillable = [
        'position_id',
        'department_id',
        'office_id',
        'first_name',
        'last_name',
        'middle_name',
        'birth_date',
        'hire_date',
        'phone',
        'email',
        'sex',
        'password',
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
        'password'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'birth_date' => 'date',
        'hire_date' => 'date',
        'sex' => SexEnum::class,
        'email_verified_at' => 'datetime',
    ];


    /**
     * @param string $name
     * @param \App\Enums\DeviceEnum $device
     * @param \Illuminate\Http\Request $request
     * @return \Laravel\Sanctum\NewAccessToken
     */
    public function createToken(string $name, string $device): NewAccessToken
    {
        $token = $this->tokens()->create([
            'name' => $name,
            'token' => hash('sha256', $plainTextToken = Str::random(40)),
            'device' => DeviceEnum::from($device),
            'ip' => \request()->ip(),
        ]);

        return new NewAccessToken($token, $token->getKey().'|'.$plainTextToken);
    }
}
