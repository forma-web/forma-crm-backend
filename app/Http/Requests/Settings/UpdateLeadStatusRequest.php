<?php

namespace App\Http\Requests\Settings;

use App\Http\Requests\BaseFormRequest;

class UpdateLeadStatusRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'min:1', 'max:255'],
        ];
    }
}