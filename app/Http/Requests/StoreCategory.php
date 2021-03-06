<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategory extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'name' => 'required|unique:categories,name,'.$this->category.'|max:64',
            'slug' => 'nullable|unique:categories,slug,'.$this->category.'|max:128',
            'img'  => 'nullable|mimes:jpeg,png,bmp,gih',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Название обязательно',
            'name.unique'   => 'Категория уже существует',
            'name.max'      => 'Длина названия не должна превышать 64 символа',
            'slug.unique'   => 'Ссылка уже существует',
            'slug.max'      => 'Длина ссылки не должна превышать 64 символа',
            'img.mimes'     => 'Недопустимый формат',
        ];
    }
}
