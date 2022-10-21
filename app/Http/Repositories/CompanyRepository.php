<?php

namespace App\Http\Repositories;

use App\Models\Companies\Company;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * @property Company $model
 */
final class CompanyRepository extends Repository
{
    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return Company::class;
    }

    public function getAllCompanies(): LengthAwarePaginator
    {
        return $this->model->paginate();
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getCompanyByPage(): LengthAwarePaginator
    {
        return $this->model->latest()->paginate();
    }

    /**
     * @param int $id
     * @return \App\Models\Companies\Company
     */
    public function getCompanyById(int $id): Company
    {
        return $this->model->findOrFail($id);
    }
}
