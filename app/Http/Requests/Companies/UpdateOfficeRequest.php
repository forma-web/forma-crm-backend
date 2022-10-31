<?php

namespace App\Http\Requests\Companies;

final class UpdateOfficeRequest extends CompanyFormRequest
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
            'address' => ['string', 'max:255'],
        ];
    }
}
