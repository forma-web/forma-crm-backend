<?php

namespace App\Http\Requests;

use App\Enums\SexEnum;
use Illuminate\Validation\Rules\Enum;

final class StoreUserRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['string', 'max:255'],
            'birth_date' => ['date'],
            'sex' => [new Enum(SexEnum::class)],
            'avatar' => ['string', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'max:255'],
        ];
    }
}
