<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait WithCompanyScope
{
    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $company_id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCompany(Builder $query, int $company_id): Builder
    {
        return $query->where('company_id', $company_id);
    }
}
