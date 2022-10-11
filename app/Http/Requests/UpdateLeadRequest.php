<?php

namespace App\Http\Requests;

use App\Enums\SexEnum;
use Illuminate\Validation\Rules\Enum;

class UpdateLeadRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'manager_id' => ['nullable', 'int', 'exists:employees,id'],
            'status_id' => ['int', 'exists:lead_statuses,id'],
            'source_id' => ['int', 'exists:lead_sources,id'],
            'first_name' => ['nullable', 'string', 'min:1', 'max:255'],
            'last_name' => ['nullable', 'string', 'min:1', 'max:255'],
            'middle_name' => ['nullable', 'string', 'min:1', 'max:255'],
            'sex' => ['nullable', new Enum(SexEnum::class)],
            'company' => ['nullable', 'string', 'min:1', 'max:255'],
            'preferences' => ['nullable', 'string', 'min:1', 'max:5000'],
            'wishes' => ['nullable', 'string', 'min:1', 'max:5000'],
            'is_important' => ['boolean'],
            'is_repeated' => ['boolean'],
        ];
    }
}
