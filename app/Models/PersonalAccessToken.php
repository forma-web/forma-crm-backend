<?php

namespace App\Models;

use App\Enums\DeviceEnum;
use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;

class PersonalAccessToken extends SanctumPersonalAccessToken
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'token',
        'device',
        'ip',
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
        'token',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'device' => DeviceEnum::class,
        'last_used_at' => 'datetime',
    ];
}
