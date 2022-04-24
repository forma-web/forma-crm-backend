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
            'name' => ['required', 'string', 'min:1', 'max:255'],
        ];
    }
}