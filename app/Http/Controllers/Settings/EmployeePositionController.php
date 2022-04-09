<?php

namespace App\Http\Controllers\Settings;

use App\Http\Repositories\Settings\EmployeePositionRepository;
use App\Http\Requests\Settings\StoreEmployeePositionRequest;
use App\Http\Requests\Settings\UpdateEmployeePositionRequest;
use App\Http\Resources\Settings\EmployeePositionResource;
use App\Models\Settings\EmployeePosition;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EmployeePositionController extends SettingsController
{
    /**
     * @var \App\Http\Repositories\Settings\EmployeePositionRepository
     */
    private EmployeePositionRepository $repository;

    /**
     * @param \App\Http\Repositories\Settings\EmployeePositionRepository $repository
     */
    public function __construct(EmployeePositionRepository $repository)
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
        return EmployeePositionResource::collection($this->repository->getAllPositions());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \App\Http\Resources\Settings\EmployeePositionResource
     */
    public function show(int $id): EmployeePositionResource
    {
        return new EmployeePositionResource($this->repository->getPositionById($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Settings\StoreEmployeePositionRequest $request
     * @return \App\Http\Resources\Settings\EmployeePositionResource
     */
    public function store(StoreEmployeePositionRequest $request): EmployeePositionResource
    {
        return new EmployeePositionResource(EmployeePosition::create($request->validated()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Settings\UpdateEmployeePositionRequest $request
     * @param int $id
     * @return void
     */
    public function update(UpdateEmployeePositionRequest $request, int $id): void
    {
        $this->repository->getPositionById($id)->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        $this->repository->getPositionById($id)->delete();
    }
}
