<?php

namespace App\Models\Companies;

use Illuminate\Database\Eloquent\Relations\Pivot;

final class PermissionPosition extends Pivot
{
    /**
     * @var bool
     */
    public $incrementing = true;

    /**
     * @var string
     */
    protected $table = 'permissions_positions';
}
