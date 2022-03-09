<?php

namespace App\Http\Repositories\Settings;

use App\Http\Repositories\BaseRepository;
use App\Models\Settings\EmployeeOffice;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EmployeeOfficeRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return EmployeeOffice::class;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllOffices(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getOfficeById(int $id): Model
    {
        return $this->model->findOrFail($id);
    }
}
