<?php

namespace App\Http\Requests\Companies;

final class UpdateDepartmentRequest extends CompanyFormRequest
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
        ];
    }
}
