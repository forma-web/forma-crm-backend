<?php

namespace App\Http\Controllers;

use App\Http\Repositories\LeadRepository;
use App\Http\Requests\StoreLeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use App\Http\Resources\LeadResource;
use App\Models\Lead;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LeadController extends Controller
{
    /**
     * @var \App\Http\Repositories\LeadRepository
     */
    private LeadRepository $repository;

    /**
     * @param \App\Http\Repositories\LeadRepository $repository
     */
    public function __construct(LeadRepository $repository)
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
        return LeadResource::collection($this->repository->getAllLeads());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \App\Http\Resources\LeadResource
     */
    public function show(int $id): LeadResource
    {
        return new LeadResource($this->repository->getLeadById($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLeadRequest  $request
     * @return \App\Http\Resources\LeadResource
     */
    public function store(StoreLeadRequest $request): LeadResource
    {
        return new LeadResource(Lead::create($request->validated()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateLeadRequest $request
     * @param int $id
     * @return void
     */
    public function update(UpdateLeadRequest $request, int $id): void
    {
        $this->repository->getLeadById($id)->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        $this->repository->getLeadById($id)->delete();
    }
}
