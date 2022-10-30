<?php

namespace App\Http\Repositories;

use App\Models\Companies\Company;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getUserCompanies(): Collection
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        return $user->companies()->select('companies.*', 'company_user.type')->get();
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getCompanyById(int $id): Model
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getCompanyInfoById(int $id): Model
    {
        return $this->model
            ->with('departments', 'offices', 'positions')
            ->findOrFail($id);
    }
}
