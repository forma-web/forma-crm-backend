<?php

namespace App\Models;

use App\Enums\SexEnum;
use App\Models\Settings\LeadSource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sources(): BelongsTo
    {
        return $this->belongsTo(LeadSource::class, 'source_id');
    }
}
