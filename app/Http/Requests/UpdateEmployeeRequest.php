<?php

namespace App\Http\Requests;

use App\Enums\SexEnum;
use Illuminate\Validation\Rules\Enum;

class UpdateEmployeeRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'position_id' => ['numeric', 'exists:employee_positions,id'],
            'department_id' => ['numeric', 'exists:employee_departments,id'],
            'first_name' => ['string', 'min:1', 'max:255'],
            'last_name' => ['string', 'min:1', 'max:255'],
            'middle_name' => ['nullable', 'string', 'min:1', 'max:255'],
            'birth_date' => ['date'],
            'hire_date' => ['date'],
            'phone' => ['string', 'min:1', 'max:255'],
            'email' => ['string', 'email', 'min:1', 'max:255'],
            'sex' => [new Enum(SexEnum::class)],
            'password' => ['string', 'min:6', 'max:255'],
            'confirm_password' => ['required_with:password', 'string', 'same:password'],
        ];
    }
}
