<?php

namespace App\Models\Companies;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Office extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
    ];
}
