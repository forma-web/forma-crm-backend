<?php

namespace App\Http\Controllers\Settings;

use App\Http\Repositories\Settings\EmployeeOfficeRepository;
use App\Http\Requests\Settings\StoreEmployeeOfficeRequest;
use App\Http\Requests\Settings\UpdateEmployeeOfficeRequest;
use App\Http\Resources\Settings\EmployeeOfficeResource;
use App\Models\Settings\EmployeeOffice;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EmployeeOfficeController extends SettingsController
{
    /**
     * @var \App\Http\Repositories\Settings\EmployeeOfficeRepository
     */
    private EmployeeOfficeRepository $repository;

    /**
     * @param \App\Http\Repositories\Settings\EmployeeOfficeRepository $repository
     */
    public function __construct(EmployeeOfficeRepository $repository)
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
        return EmployeeOfficeResource::collection($this->repository->getAllOffices());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \App\Http\Resources\Settings\EmployeeOfficeResource
     */
    public function show(int $id): EmployeeOfficeResource
    {
        return new EmployeeOfficeResource($this->repository->getOfficeById($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Settings\StoreEmployeeOfficeRequest $request
     * @return \App\Http\Resources\Settings\EmployeeOfficeResource
     */
    public function store(StoreEmployeeOfficeRequest $request): EmployeeOfficeResource
    {
        return new EmployeeOfficeResource(EmployeeOffice::create($request->validated()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Settings\UpdateEmployeeOfficeRequest $request
     * @param int $id
     * @return void
     */
    public function update(UpdateEmployeeOfficeRequest $request, int $id): void
    {
        $this->repository->getOfficeById($id)->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        $this->repository->getOfficeById($id)->delete();
    }
}
