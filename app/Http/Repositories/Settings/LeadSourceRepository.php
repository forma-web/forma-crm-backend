<?php

namespace App\Http\Repositories\Settings;

use App\Http\Repositories\BaseRepository;
use App\Models\Settings\LeadSource;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class LeadSourceRepository extends BaseRepository
{
    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return LeadSource::class;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allSources(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getSourceById(int $id): Model
    {
        return $this->model->findOrFail($id);
    }
}
