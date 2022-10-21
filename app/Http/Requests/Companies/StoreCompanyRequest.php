<?php

namespace App\Http\Requests\Companies;

use App\Http\Requests\BaseFormRequest;

final class StoreCompanyRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'inn' => ['string', 'max:255', 'unique:companies'],
            'address' => ['string', 'max:255'],
        ];
    }
}
