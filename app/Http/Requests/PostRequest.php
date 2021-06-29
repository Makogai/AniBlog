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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->is('admin/posts/store') ? $this->createRules() : $this->updateRules();
    }

    public function messages()
    {
        return [



        ];
    }

    public function createRules(){
        return [

            'title' => 'required|max:100',
            // 'email' => 'required|email|unique',
            'post_image' => 'required|max:5000|mimes:jpeg,png,jpg,gif,svg',
            'content' => 'required|max:10000',
            'short_content' => 'required|max:200',
            'categories' => 'nullable|array',
            'post_image' => $this->isMethod('POST') ? 'required' : ''
        ];
    }

    public function updateRules(){
        return [
            'title' => 'required|max:100',
            // 'email' => 'required|email|unique',
            'post_image' => 'nullable|max:5000|mimes:jpeg,png,jpg,gif,svg',
            'content' => 'required|max:10000',
            'short_content' => 'required|max:200',
            'categories' => 'nullable|array'
        ];
    }

}
