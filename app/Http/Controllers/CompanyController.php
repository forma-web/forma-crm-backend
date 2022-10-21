<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CompanyRepository;
use App\Http\Requests\Companies\StoreCompanyRequest;
use App\Http\Requests\Companies\UpdateCompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Companies\Company;
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
        return CompanyResource::collection($this->repository->getAllCompanies());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \App\Http\Resources\CompanyResource
     */
    public function create(StoreCompanyRequest $request)
    {
        return new CompanyResource(Company::create($request->validated()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Companies\StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Companies\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Companies\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Companies\UpdateCompanyRequest  $request
     * @param  \App\Models\Companies\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Companies\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
