<?php

namespace App\Http\Repositories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EmployeeRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return Employee::class;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllEmployees(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEmployeeById(int $id): Model
    {
        return $this->model->findOrFail($id);
    }
}
