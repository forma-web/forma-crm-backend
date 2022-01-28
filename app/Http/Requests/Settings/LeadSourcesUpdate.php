<?php

namespace App\Http\Requests\Settings;

use App\Http\Requests\BaseFormRequest;

class LeadSourcesUpdate extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255', 'unique:lead_sources'],
        ];
    }
}
