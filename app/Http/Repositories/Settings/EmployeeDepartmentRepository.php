<?php

namespace App\Http\Repositories\Settings;

use App\Http\Repositories\BaseRepository;
use App\Models\Settings\EmployeeDepartment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EmployeeDepartmentRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return EmployeeDepartment::class;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllDepartments(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getDepartmentById(int $id): Model
    {
        return $this->model->findOrFail($id);
    }
}
