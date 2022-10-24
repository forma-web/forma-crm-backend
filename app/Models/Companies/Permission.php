<?php

namespace App\Models\Companies;

use App\Enums\PermissionScopesEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Permission extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'scope',
    ];

    protected $casts = [
        'scope' => PermissionScopesEnum::class,
    ];
}
