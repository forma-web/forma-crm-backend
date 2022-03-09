<?php

namespace App\Http\Requests\Settings;

use App\Http\Requests\BaseFormRequest;

class StoreEmployeeDepartmentRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'office_id' => ['required', 'numeric', 'exists:employee_offices,id'],
            'name' => ['required', 'string', 'max:255'],
        ];
    }
}
