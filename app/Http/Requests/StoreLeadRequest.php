<?php

namespace App\Http\Requests;

use App\Enums\SexEnum;
use Illuminate\Validation\Rules\Enum;

class StoreLeadRequest extends BaseFormRequest
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
            'status_id' => ['required', 'int', 'exists:lead_statuses,id'],
            'source_id' => ['required', 'int', 'exists:lead_sources,id'],
            'first_name' => ['nullable', 'string', 'min:1', 'max:255',
                'required_without_all:last_name, middle_name, sex, company, preferences, wishes'],
            'last_name' => ['nullable', 'string', 'min:1', 'max:255',
                'required_without_all:first_name, middle_name, sex, company, preferences, wishes'],
            'middle_name' => ['nullable', 'string', 'min:1', 'max:255',
                'required_without_all:first_name, last_name, sex, company, preferences, wishes'],
            'sex' => ['nullable', new Enum(SexEnum::class),
                'required_without_all:first_name, last_name, middle_name, company, preferences, wishes'],
            'company' => ['nullable', 'string', 'min:1', 'max:255',
                'required_without_all:first_name, last_name, middle_name, sex, preferences, wishes'],
            'preferences' => ['nullable', 'string', 'min:1', 'max:5000',
                'required_without_all:first_name, last_name, middle_name, sex, company, wishes'],
            'wishes' => ['nullable', 'string', 'min:1', 'max:5000',
                'required_without_all:first_name, last_name, middle_name, sex, company, preferences'],
            'is_important' => ['boolean'],
            'is_repeated' => ['boolean'],
        ];
    }
}
