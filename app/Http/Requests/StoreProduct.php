<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'name'          => 'required|unique:products|max:64',
            'slug'          => 'nullable|unique:products|max:128',
            'description'   => 'nullable|',
            'category'      => 'required|in:'.implode(',',\App\Category::all()->pluck('id')->toArray()),
            'img'           => 'nullable|mimes:jpeg,png,bmp,gih',
            'price'         => 'required|numeric',
            'recomended'    => 'nullable|boolean',
        ];
    }

    public function messages(){
        return [
            'name.required'   => 'Название обязательно',
            'name.unique'     => 'Товар уже существует',
            'name.max'        => 'Длина названия не должна превышать 64 символа',
            'slug.unique'     => 'Ссылка уже существует',
            'slug.max'        => 'Длина ссылки не должна превышать 64 символа',
            'description.max' => 'Длина описания не должна превышать 256 символов',
        ];
    }
}
