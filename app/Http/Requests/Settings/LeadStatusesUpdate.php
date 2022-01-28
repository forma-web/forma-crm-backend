<?php

namespace App\Http\Requests\Settings;

use App\Http\Requests\BaseFormRequest;

class LeadStatusesUpdate extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'min:3', 'max:255'],
            'step' => ['numeric', 'min:1'],
        ];
    }
}
