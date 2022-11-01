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
            'name' => ['nullable', 'string', 'max:255'],
            'inn' => ['nullable', 'string', 'max:255', 'unique:companies'],
            'address' => ['nullable', 'string', 'max:255'],
        ];
    }
}
