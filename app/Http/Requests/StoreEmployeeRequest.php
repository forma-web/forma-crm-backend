<?php

namespace App\Http\Requests;

use App\Enums\SexEnum;
use Illuminate\Validation\Rules\Enum;

class StoreEmployeeRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'position_id' => ['required', 'numeric', 'exists:employee_positions,id'],
            'department_id' => ['required', 'numeric', 'exists:employee_departments,id'],
            'first_name' => ['required', 'string', 'min:1', 'max:255'],
            'last_name' => ['required', 'string', 'min:1', 'max:255'],
            'middle_name' => ['nullable', 'string', 'min:1', 'max:255'],
            'birth_date' => ['required', 'date'],
            'hire_date' => ['required', 'date'],
            'phone' => ['required', 'string', 'min:1', 'max:255'],
            'email' => ['required', 'string', 'email', 'min:1', 'max:255'],
            'sex' => ['required', new Enum(SexEnum::class)],
            'password' => ['required', 'string', 'min:6', 'max:255'],
            'confirm_password' => ['required', 'string', 'same:password'],
        ];
    }
}
