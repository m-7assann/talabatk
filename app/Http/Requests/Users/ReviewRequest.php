<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'review'=>['required','string'],
            'value'=>['required','numeric'],
        ];
    }
    public function messages()
    {
        return [
            'review.required'=>'يرجى إدحال نص المراجعة',
            'value.required'=>'يرجى تقييم الوجبة'
        ];
    }
}
