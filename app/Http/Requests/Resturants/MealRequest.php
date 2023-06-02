<?php

namespace App\Http\Requests\Resturants;

use Illuminate\Foundation\Http\FormRequest;

class MealRequest extends FormRequest
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
            'name'=>['required'],
            'price'=>['required','numeric'],
            'resturant_id'=>['required','exists:resturants,id'],
            'category_id'=>['required','exists:categories,id'],
            'description'=>['nullable'],
            'pic'=>['required_without:id'],
            'discount'=>['required','numeric'],
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'يرجى ادخال اسم الوجبة',
            'price.required'=>'يرجى ادخال سعر الوجبة',
            'price.numeric'=>'يجب أن يكون سعر الوجبة رقما',
            'category_id.required'=>'يرجى تحديد القسم الذي تنتمي اليه الوجبة',
            'pic.required_without'=>'يرجى ادخال صورة للوجبة',
            'discount.required'=>'يرجى ادخال خصم للوجبة',
            'discount.numeric'=>'يجب أن يكون خصم الوجبة رقما',
            
        ];
    }
}
