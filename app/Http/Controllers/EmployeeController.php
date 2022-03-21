<?php

namespace App\Http\Controllers;

use App\Http\Repositories\EmployeeRepository;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EmployeeController extends Controller
{
    /**
     * @var \App\Http\Repositories\EmployeeRepository
     */
    private EmployeeRepository $repository;

    /**
     * @param \App\Http\Repositories\EmployeeRepository $repository
     */
    public function __construct(EmployeeRepository $repository)
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
        return EmployeeResource::collection($this->repository->getAllEmployees());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \App\Http\Resources\EmployeeResource
     */
    public function show(int $id): EmployeeResource
    {
        return new EmployeeResource($this->repository->getEmployeeById($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \App\Http\Resources\EmployeeResource
     */
    public function store(StoreEmployeeRequest $request): EmployeeResource
    {
        return new EmployeeResource(Employee::create($request->validated()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateEmployeeRequest $request
     * @param int $id
     * @return void
     */
    public function update(UpdateEmployeeRequest $request, int $id): void
    {
        $this->repository->getEmployeeById($id)->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        $this->repository->getEmployeeById($id)->delete();
    }
}
