<?php

namespace App\Http\Requests\Settings;

use App\Http\Requests\BaseFormRequest;

class StoreEmployeePositionRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:1', 'max:255', 'unique:employee_positions'],
        ];
    }
}
