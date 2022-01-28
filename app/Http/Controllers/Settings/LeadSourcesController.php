<?php

namespace App\Http\Controllers\Settings;

use App\Http\Repositories\Settings\LeadSourcesRepository;
use App\Http\Requests\Settings\StoreLeadSourcesRequest;
use App\Http\Requests\Settings\UpdateLeadSourcesRequest;
use App\Http\Resources\Settings\LeadSourcesResource;
use App\Models\Settings\LeadSources;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LeadSourcesController extends SettingsController
{
    /**
     * @var LeadSourcesRepository
     */
    private LeadSourcesRepository $repository;

    /**
     * @param LeadSourcesRepository $repository
     */
    public function __construct(LeadSourcesRepository $repository)
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
        return LeadSourcesResource::collection($this->repository->allSources());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \App\Http\Resources\Settings\LeadSourcesResource
     */
    public function show(int $id): LeadSourcesResource
    {
        return new LeadSourcesResource($this->repository->getSourceById($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Settings\StoreLeadSourcesRequest $request
     * @return \App\Http\Resources\Settings\LeadSourcesResource
     */
    public function store(StoreLeadSourcesRequest $request): LeadSourcesResource
    {
        return new LeadSourcesResource(LeadSources::create($request->validated()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Settings\UpdateLeadSourcesRequest $request
     * @param int $id
     * @return void
     */
    public function update(UpdateLeadSourcesRequest $request, int $id): void
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
