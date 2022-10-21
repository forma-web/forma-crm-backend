<?php

namespace App\Http\Requests;

use App\Enums\SexEnum;
use Illuminate\Validation\Rules\Enum;

final class UpdateUserRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => ['string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'middle_name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'phone' => ['string', 'max:255'],
            'birth_date' => ['date'],
            'sex' => [new Enum(SexEnum::class)],
            'avatar' => ['string', 'max:255'],
            'password' => ['string', 'min:6', 'max:255'],
        ];
    }
}
