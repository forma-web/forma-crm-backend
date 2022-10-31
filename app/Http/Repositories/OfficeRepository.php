<?php

namespace App\Http\Repositories;

use App\Models\Companies\Office;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Office $model
 */
final class OfficeRepository extends Repository
{
    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return Office::class;
    }

    /**
     * @param int $companyId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllCompanyOffices(int $companyId): Collection
    {
        return Office::company($companyId)->get();
    }

    /**
     * @param int $companyId
     * @param int $officeId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getCompanyOfficeById(int $companyId, int $officeId): Model
    {
        return Office::company($companyId)->findOrFail($officeId);
    }
}
