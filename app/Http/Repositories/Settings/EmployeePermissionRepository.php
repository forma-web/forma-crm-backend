<?php

namespace App\Http\Repositories\Settings;

use App\Http\Repositories\BaseRepository;
use App\Models\Settings\EmployeePermission;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EmployeePermissionRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return EmployeePermission::class;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllPermissions(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getPermissionById(int $id): Model
    {
        return $this->model->findOrFail($id);
    }
}
