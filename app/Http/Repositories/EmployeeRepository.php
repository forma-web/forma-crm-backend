<?php

namespace App\Http\Repositories;

use App\Models\Employee;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
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
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllEmployees(): LengthAwarePaginator
    {
        return $this->model
            ->select([
                'employees.*',
                'employee_offices.name as office',
                'employee_departments.name as department',
                'employee_positions.name as position',
            ])
            ->leftJoin('employee_offices', 'employees.office_id', '=', 'employee_offices.id')
            ->leftJoin('employee_departments', 'employees.department_id', '=', 'employee_departments.id')
            ->leftJoin('employee_positions', 'employees.position_id', '=', 'employee_positions.id')
            ->orderBy('id')
            ->paginate();
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
