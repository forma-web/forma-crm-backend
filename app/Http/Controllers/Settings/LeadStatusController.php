<?php

namespace App\Http\Controllers\Settings;

use App\Http\Repositories\Settings\LeadStatusRepository;
use App\Http\Requests\Settings\StoreEmployeeOfficeRequest;
use App\Http\Requests\Settings\UpdateLeadStatusRequest;
use App\Http\Resources\Settings\LeadStatusResource;
use App\Models\Settings\LeadStatus;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LeadStatusController extends SettingsController
{
    /**
     * @var LeadStatusRepository
     */
    private LeadStatusRepository $repository;

    /**
     * @param LeadStatusRepository $repository
     */
    public function __construct(LeadStatusRepository $repository)
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
        return LeadStatusResource::collection($this->repository->allStatuses());
    }

    /**
     * Получение статуса по id
     *
     * @param int $id
     * @return LeadStatusResource
     */
    public function show(int $id): LeadStatusResource
    {
        return new LeadStatusResource($this->repository->getStatusById($id));
    }

    /**
     * @param \App\Http\Requests\Settings\StoreEmployeeOfficeRequest $request
     * @return \App\Http\Resources\Settings\LeadStatusResource
     */
    public function store(StoreEmployeeOfficeRequest $request): LeadStatusResource
    {
        return new LeadStatusResource(LeadStatus::create($request->validated()));
    }

    /**
     * @param \App\Http\Requests\Settings\UpdateLeadStatusRequest $request
     * @param int $id
     */
    public function update(UpdateLeadStatusRequest $request, int $id): void
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
