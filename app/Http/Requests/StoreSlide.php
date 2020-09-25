<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSlide extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'img' => 'required|image',
            'product_id' => 'required|in:'.implode(',',\App\Product::all()->pluck('id')->toArray()),
        ];
    }

    public function messages(){
        return [
            'img.required'        => 'Изображение обязательно',
            'img.image'           => 'Недопустимый формат',
            'product_id.required' => 'Товар обязателен',
            'product_id.in'       => 'Товар не найден',
        ];
    }
}
