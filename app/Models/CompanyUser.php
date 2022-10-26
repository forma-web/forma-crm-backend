<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

final class CompanyUser extends Pivot
{
    /**
     * @var bool
     */
    public $incrementing = true;
}
