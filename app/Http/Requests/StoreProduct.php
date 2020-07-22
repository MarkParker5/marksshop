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
            'slug'          => 'required|unique:products|max:128',
            'description'   => 'nullable|max:256',
            'category'      => 'required|in:'.implode(',',\App\Category::all()->pluck('id')->toArray()),
            'img'           => 'nullable|mimes:jpeg,png,bmp,gih',
            'price'         => 'required|numeric',
            'recomended'    => 'nullable|boolean',
        ];
    }
}
