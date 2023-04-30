<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string'],
            'second_name' => ['required', 'string'],
            'middle_name' => ['string'],
            'note' => ['string'],
            'sex' => ['required','in:man,woman'],
            'birth_date' => ['required', 'date'],
        ]; //не работает пока что...
    }
}
