<?php

namespace App\Models;

use App\Enums\SexEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'position_id',
        'department_id',
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
    ];
}
