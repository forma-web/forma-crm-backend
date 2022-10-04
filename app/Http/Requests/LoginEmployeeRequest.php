<?php

namespace App\Http\Requests;

use App\Enums\DeviceEnum;
use Illuminate\Validation\Rules\Enum;

class LoginEmployeeRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string', 'email', 'min:1', 'max:255', 'exists:employees'],
            'password' => ['required', 'string', 'min:6', 'max:255'],
        ];
    }
}
