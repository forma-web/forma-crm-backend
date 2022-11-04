<?php

namespace App\Http\Controllers;

use App\Http\Repositories\OfficeRepository;
use App\Http\Requests\Companies\StoreOfficeRequest;
use App\Http\Requests\Companies\UpdateOfficeRequest;
use App\Http\Resources\OfficeResource;
use App\Models\Companies\Office;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class OfficeController extends Controller
{
    /**
     * @var \App\Http\Repositories\OfficeRepository
     */
    private OfficeRepository $repository;

    /**
     * @param \App\Http\Repositories\OfficeRepository $userRepository
     */
    public function __construct(OfficeRepository $userRepository)
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
        return OfficeResource::collection($this->repository->getAllCompanyOffices($companyId));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param int $companyId
     * @param \App\Http\Requests\Companies\StoreOfficeRequest $request
     * @return \App\Http\Resources\OfficeResource
     */
    public function store(int $companyId, StoreOfficeRequest $request): OfficeResource
    {
        return new OfficeResource(
            Office::create($request->safeWithCompany($companyId))
        );
    }

    /**
     * Display the specified resource.
     *
     * @param int $companyId
     * @param int $officeId
     * @return \App\Http\Resources\OfficeResource
     */
    public function show(int $companyId, int $officeId): OfficeResource
    {
        return new OfficeResource($this->repository->getCompanyOfficeById($companyId, $officeId));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $companyId
     * @param int $officeId
     * @param \App\Http\Requests\Companies\UpdateOfficeRequest $request
     * @return void
     */
    public function update(int $companyId, int $officeId, UpdateOfficeRequest $request): void
    {
        $this->repository->getCompanyOfficeById($companyId, $officeId)->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $companyId
     * @param int $officeId
     * @return void
     */
    public function destroy(int $companyId, int $officeId): void
    {
        $this->repository->getCompanyOfficeById($companyId, $officeId)->delete();
    }
}
