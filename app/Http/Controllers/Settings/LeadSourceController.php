<?php

namespace App\Http\Controllers\Settings;

use App\Http\Repositories\Settings\LeadSourceRepository;
use App\Http\Requests\Settings\StoreLeadSourceRequest;
use App\Http\Requests\Settings\UpdateLeadSourceRequest;
use App\Http\Resources\Settings\LeadSourceResource;
use App\Models\Settings\LeadSource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LeadSourceController extends SettingsController
{
    /**
     * @var LeadSourceRepository
     */
    private LeadSourceRepository $repository;

    /**
     * @param LeadSourceRepository $repository
     */
    public function __construct(LeadSourceRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return LeadSourceResource::collection($this->repository->allSources());
    }

    /**
     * @param int $id
     * @return \App\Http\Resources\Settings\LeadSourceResource
     */
    public function show(int $id): LeadSourceResource
    {
        return new LeadSourceResource($this->repository->getSourceById($id));
    }

    /**
     * @param \App\Http\Requests\Settings\StoreLeadSourceRequest $request
     * @return \App\Http\Resources\Settings\LeadSourceResource
     */
    public function store(StoreLeadSourceRequest $request): LeadSourceResource
    {
        return new LeadSourceResource(LeadSource::create($request->validated()));
    }

    /**
     * @param \App\Http\Requests\Settings\UpdateLeadSourceRequest $request
     * @param int $id
     */
    public function update(UpdateLeadSourceRequest $request, int $id): void
    {
        $this->repository->getSourceById($id)->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        $this->repository->getSourceById($id)->delete();
    }
}
