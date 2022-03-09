<?php

namespace App\Http\Controllers\Settings;

use App\Http\Repositories\Settings\EmployeeDepartmentRepository;
use App\Http\Requests\Settings\StoreEmployeeDepartmentRequest;
use App\Http\Requests\Settings\UpdateEmployeeDepartmentRequest;
use App\Http\Resources\Settings\EmployeeDepartmentResource;
use App\Models\Settings\EmployeeDepartment;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EmployeeDepartmentController extends SettingsController
{
    /**
     * @var \App\Http\Repositories\Settings\EmployeeDepartmentRepository
     */
    private EmployeeDepartmentRepository $repository;

    /**
     * @param \App\Http\Repositories\Settings\EmployeeDepartmentRepository $repository
     */
    public function __construct(EmployeeDepartmentRepository $repository)
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
        return EmployeeDepartmentResource::collection($this->repository->getAllDepartments());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \App\Http\Resources\Settings\EmployeeDepartmentResource
     */
    public function show(int $id): EmployeeDepartmentResource
    {
        return new EmployeeDepartmentResource($this->repository->getDepartmentById($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Settings\StoreEmployeeDepartmentRequest $request
     * @return \App\Http\Resources\Settings\EmployeeDepartmentResource
     */
    public function store(StoreEmployeeDepartmentRequest $request): EmployeeDepartmentResource
    {
        return new EmployeeDepartmentResource(EmployeeDepartment::create($request->validated()));
    }

    /**
     * @param \App\Http\Requests\Settings\UpdateEmployeeDepartmentRequest $request
     * @param int $id
     */
    public function update(UpdateEmployeeDepartmentRequest $request, int $id): void
    {
        $this->repository->getDepartmentById($id)->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        $this->repository->getDepartmentById($id)->delete();
    }
}
