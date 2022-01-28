<?php

namespace App\Http\Repositories\Settings;

use App\Http\Repositories\BaseRepository;
use App\Models\Settings\LeadSources;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class LeadSourcesRepository extends BaseRepository
{
    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return LeadSources::class;
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
