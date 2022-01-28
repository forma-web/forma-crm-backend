<?php

namespace App\Http\Requests;

class UpdateFeedbackRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'client' => ['string', 'min:1', 'max:255'],
            'raiting' => ['numeric', 'between:1,5'],
            'advantages' => ['string', 'min:1', 'max:5000'],
            'disadvantages' => ['string', 'min:1', 'max:5000'],
            'comment' => ['string', 'min:1', 'max:5000'],
        ];
    }
}
