<?php

namespace App\Http\Controllers;

use App\Http\Repositories\DepartmentRepository;
use App\Http\Requests\Companies\StoreDepartmentRequest;
use App\Http\Requests\Companies\UpdateDepartmentRequest;
use App\Http\Resources\DepartmentResource;
use App\Models\Companies\Department;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class DepartmentController extends Controller
{
    /**
     * @var \App\Http\Repositories\DepartmentRepository
     */
    private DepartmentRepository $repository;

    /**
     * @param \App\Http\Repositories\DepartmentRepository $userRepository
     */
    public function __construct(DepartmentRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param int $companyId
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(int $companyId): AnonymousResourceCollection
    {
        return DepartmentResource::collection($this->repository->getAllCompanyDepartment($companyId));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Companies\StoreDepartmentRequest $request
     * @param int $companyId
     * @return \App\Http\Resources\DepartmentResource
     */
    public function store(StoreDepartmentRequest $request, int $companyId): DepartmentResource
    {
        return new DepartmentResource(
            Department::create($request->safeWithCompany($companyId))
        );
    }

    /**
     * Display the specified resource.
     *
     * @param int $companyId
     * @param int $departmentId
     * @return \App\Http\Resources\DepartmentResource
     */
    public function show(int $companyId, int $departmentId): DepartmentResource
    {
        return new DepartmentResource(
            $this->repository->getCompanyDepartmentById($companyId, $departmentId)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Companies\UpdateDepartmentRequest $request
     * @param int $companyId
     * @return void
     */
    public function update(UpdateDepartmentRequest $request, int $companyId, int $departmentId): void
    {
        $this->repository->getCompanyDepartmentById($companyId, $departmentId)->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $companyId
     * @param int $departmentId
     * @return void
     */
    public function destroy(int $companyId, int $departmentId): void
    {
        $this->repository->getCompanyDepartmentById($companyId, $departmentId)->delete();
    }
}
