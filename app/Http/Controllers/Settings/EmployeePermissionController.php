<?php

namespace App\Http\Controllers\Settings;

use App\Http\Repositories\Settings\EmployeePermissionRepository;
use App\Http\Requests\Settings\StoreEmployeePermissionRequest;
use App\Http\Requests\Settings\UpdateEmployeePermissionRequest;
use App\Http\Resources\Settings\EmployeePermissionResource;
use App\Models\Settings\EmployeePermission;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EmployeePermissionController extends SettingsController
{
    /**
     * @var \App\Http\Repositories\Settings\EmployeePermissionRepository
     */
    private EmployeePermissionRepository $repository;

    /**
     * @param \App\Http\Repositories\Settings\EmployeePermissionRepository $repository
     */
    public function __construct(EmployeePermissionRepository $repository)
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
        return EmployeePermissionResource::collection($this->repository->getAllPermissions());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \App\Http\Resources\Settings\EmployeePermissionResource
     */
    public function show(int $id): EmployeePermissionResource
    {
        return new EmployeePermissionResource($this->repository->getPermissionById($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Settings\StoreEmployeePermissionRequest $request
     * @return \App\Http\Resources\Settings\EmployeePermissionResource
     */
    public function store(StoreEmployeePermissionRequest $request): EmployeePermissionResource
    {
        return new EmployeePermissionResource(EmployeePermission::create($request->validated()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Settings\UpdateEmployeePermissionRequest $request
     * @param int $id
     * @return void
     */
    public function update(UpdateEmployeePermissionRequest $request, int $id): void
    {
        $this->repository->getPermissionById($id)->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        $this->repository->getPermissionById($id)->delete();
    }
}
