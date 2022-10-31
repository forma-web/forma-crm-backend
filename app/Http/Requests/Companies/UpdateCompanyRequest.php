<?php

namespace App\Http\Requests\Companies;

final class UpdateCompanyRequest extends CompanyFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'inn' => ['string', 'max:255', 'unique:companies'],
            'address' => ['string', 'max:255'],
        ];
    }
}
