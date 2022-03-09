<?php

namespace App\Http\Repositories\Settings;

use App\Http\Repositories\BaseRepository;
use App\Models\Settings\LeadStatus;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class LeadStatusRepository extends BaseRepository
{
    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return LeadStatus::class;
    }

    /**
     * @return Collection
     */
    public function allStatuses(): Collection
    {
        return $this->model->orderBy('step')->get();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getStatusById(int $id): Model
    {
        return $this->model->findOrFail($id);
    }
}
