<?php

namespace App\Http\Requests\Companies;

use Illuminate\Foundation\Http\FormRequest;

abstract class CompanyFormRequest extends FormRequest
{
    /**
     * @param int $companyId
     * @return array
     */
    public function safeWithCompany(int $companyId): array
    {
        return $this->safe()->merge(['company_id' => $companyId])->all();
    }
}
