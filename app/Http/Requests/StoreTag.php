<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTag extends FormRequest
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
            'name' => 'required|unique:tags|max:64',
            'slug' => 'required|unique:tags|max:128',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Название обязательно',
            'name.unique'   => 'Тег уже существует',
            'name.max'      => 'Длина названия не должна превышать 64 символа',
            'slug.unique'   => 'Ссылка уже существует',
            'slug.max'      => 'Длина ссылки не должна превышать 64 символа',
        ];
    }
}
