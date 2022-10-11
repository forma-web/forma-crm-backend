<?php

namespace App\Http\Repositories\Settings;

use App\Http\Repositories\BaseRepository;
use App\Models\Settings\EmployeePosition;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EmployeePositionRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return EmployeePosition::class;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllPositions(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getPositionById(int $id): Model
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPositionPermissions(int $id): Collection
    {
        return $this->getPositionById($id)->permissions()->get();
    }
}

