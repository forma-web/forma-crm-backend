<?php

namespace App\Http\Controllers\Settings;

use App\Http\Repositories\Settings\LeadStatusesRepository;
use App\Http\Requests\Settings\LeadSourcesUpdate;
use App\Http\Requests\Settings\LeadStatusesUpdate;
use App\Http\Resources\Settings\LeadStatusesResource;
use App\Models\Settings\LeadStatuses;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LeadStatusesController extends SettingsController
{
    /**
     * @var LeadStatusesRepository
     */
    private LeadStatusesRepository $repository;

    /**
     * @param LeadStatusesRepository $repository
     */
    public function __construct(LeadStatusesRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Получение всех списка всех статусов
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return LeadStatusesResource::collection($this->repository->allStatuses());
    }

    /**
     * Получение статуса по id
     *
     * @param int $id
     * @return LeadStatusesResource
     */
    public function show(int $id): LeadStatusesResource
    {
        return new LeadStatusesResource($this->repository->getStatusById($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LeadSourcesUpdate $request
     * @return LeadStatusesResource
     */
    public function store(LeadSourcesUpdate $request): LeadStatusesResource
    {
        return new LeadStatusesResource(LeadStatuses::create($request->validated()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LeadStatusesUpdate $request
     * @param int $id
     * @return void
     */
    public function update(LeadStatusesUpdate $request, int $id): void
    {
        $this->repository->getStatusById($id)->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        $this->repository->getStatusById($id)->delete();
    }
}
