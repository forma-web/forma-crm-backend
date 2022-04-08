<?php

namespace App\Http\Requests\Settings;

use App\Http\Requests\BaseFormRequest;

class StoreEmployeeOfficeRequest extends BaseFormRequest
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
            'location' => ['required', 'string', 'min:1', 'max:255'],
        ];
    }
}
