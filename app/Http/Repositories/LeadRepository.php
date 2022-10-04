<?php

namespace App\Http\Repositories;

use App\Models\Lead;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
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
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllLeads(): LengthAwarePaginator
    {
        return $this->model
            ->select([
                'leads.*',
                'lead_sources.name as source',
                'lead_statuses.name as status',
            ])
            ->leftJoin('lead_sources', 'leads.source_id', '=', 'lead_sources.id')
            ->leftJoin('lead_statuses', 'leads.status_id', '=', 'lead_statuses.id')
            ->latest()
            ->paginate();
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
