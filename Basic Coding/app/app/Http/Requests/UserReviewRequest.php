<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserReviewRequest extends FormRequest
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
            'rating' => 'required|integer',
            'order_id' => 'required|integer',
            'product_id' => 'required|integer',
            'user_id' => 'required|integer',
            'review' => 'required|max:255|min:2'
        ];
    }
}
