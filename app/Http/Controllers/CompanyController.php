<?php

namespace App\Http\Controllers;

use App\Enums\CompanyUserTypesEnum;
use App\Http\Repositories\CompanyRepository;
use App\Http\Requests\Companies\StoreCompanyRequest;
use App\Http\Requests\Companies\UpdateCompanyRequest;
use App\Http\Resources\CompanyResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class CompanyController extends Controller
{
    /**
     * @var \App\Http\Repositories\CompanyRepository
     */
    private CompanyRepository $repository;

    /**
     * @param \App\Http\Repositories\CompanyRepository $companyRepository
     */
    public function __construct(CompanyRepository $companyRepository)
    {
        $this->repository = $companyRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return CompanyResource::collection($this->repository->getUserCompanies());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Companies\StoreCompanyRequest  $request
     * @return \App\Http\Resources\CompanyResource
     */
    public function store(StoreCompanyRequest $request): CompanyResource
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $newCompany = $user->companies()->create($request->validated(), ['type' => CompanyUserTypesEnum::OWNER]);

        return new CompanyResource($newCompany);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \App\Http\Resources\CompanyResource
     */
    public function show(int $id): CompanyResource
    {
        return new CompanyResource($this->repository->getCompanyInfoById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Companies\UpdateCompanyRequest $request
     * @param int $id
     * @return void
     */
    public function update(UpdateCompanyRequest $request, int $id): void
    {
        $this->repository->getCompanyById($id)->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        $this->repository->getCompanyById($id)->delete();
    }
}
