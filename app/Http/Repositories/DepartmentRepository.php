<?php

namespace App\Http\Repositories;

use App\Models\Companies\Department;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Department $model
 */
final class DepartmentRepository extends Repository
{
    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return Department::class;
    }

    /**
     * @param int $companyId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllCompanyDepartment(int $companyId): Collection
    {
        return $this->model->company($companyId)->get();
    }

    /**
     * @param int $companyId
     * @param int $departmentId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getCompanyDepartmentById(int $companyId, int $departmentId): Model
    {
        return $this->model->company($companyId)->findOrFail($departmentId);
    }
}
