<?php

namespace App\Http\Controllers\Settings;

use App\Http\Repositories\Settings\LeadStatusesRepository;
use App\Http\Requests\Settings\UpdateLeadStatusesRequest;
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
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
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
     * @param \App\Http\Requests\Settings\UpdateLeadStatusesRequest $request
     * @return LeadStatusesResource
     */
    public function store(UpdateLeadStatusesRequest $request): LeadStatusesResource
    {
        return new LeadStatusesResource(LeadStatuses::create($request->validated()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Settings\UpdateLeadStatusesRequest $request
     * @param int $id
     * @return void
     */
    public function update(UpdateLeadStatusesRequest $request, int $id): void
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
