<?php

namespace App\Http\Repositories;

use App\Models\Lead;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class LeadRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return Lead::class;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllLeads(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getLeadById(int $id): Model
    {
        return $this->model->findOrFail($id);
    }
}
