<?php

namespace App\Models;

use App\Enums\SexEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'manager_id',
        'status_id',
        'source_id',
        'first_name',
        'last_name',
        'middle_name',
        'sex',
        'company',
        'preferences',
        'wishes',
        'is_important',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'sex' => SexEnum::class,
        'is_important' => 'boolean',
        'is_repeated' => 'boolean',
    ];
}
