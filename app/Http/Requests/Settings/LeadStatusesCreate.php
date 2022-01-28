<?php

namespace App\Http\Requests\Settings;

use App\Http\Requests\BaseFormRequest;

class LeadStatusesCreate extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'step' => ['required', 'numeric', 'min:1', 'unique:lead_statuses'],
        ];
    }
}
