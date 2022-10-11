<?php

namespace App\Http\Requests\Settings;

use App\Http\Requests\BaseFormRequest;

class StoreEmployeePermissionRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'min:1', 'max:255'],
            'description' => ['nullable', 'string', 'min:1', 'max:255'],
            'slug' => ['required', 'string', 'min:1', 'max:255', 'unique:employee_permissions'],
        ];
    }
}
