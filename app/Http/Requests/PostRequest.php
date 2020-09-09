<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // ubah jadi true, untuk validasi data yang ada di mehtod rules
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
            'title' => 'required|min:3',
            'body' => 'required',
            'category' => 'required',
            'tags' => 'array|required',
            'tumbnail' => 'image|mimes:png,jpg,jpeg|max:2048'
        ];
    }
}
