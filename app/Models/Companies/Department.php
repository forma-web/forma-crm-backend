<?php

namespace App\Models\Companies;

use App\Models\Scopes\WithCompanyScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Department extends Model
{
    use HasFactory, WithCompanyScope;

    /**
     * @var string[]
     */
    protected $fillable = [
        'company_id',
        'name',
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
        'company_id',
    ];
}
