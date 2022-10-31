<?php

namespace App\Http\Requests;

use App\Enums\UserSexEnum;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Rules\Password;

final class UpdateUserRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'middle_name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255', Rule::unique('users')->ignore(auth()->id())],
            'phone' => ['string', 'max:255'],
            'birth_date' => ['date'],
            'sex' => [new Enum(UserSexEnum::class)],
            'avatar' => ['string', 'max:255'],
            'password' => ['string', 'string', Password::min(6), 'max:255'],
        ];
    }
}
