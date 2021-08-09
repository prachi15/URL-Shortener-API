<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreShortUrlRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title'     => [
                'required',
                'max:50'
            ],
            'url'     => [
                'required',
                'max:255',
                'url'
            ],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please enter a title',
            'url.url' => 'Please enter a vaild url'
        ];
    }
}
