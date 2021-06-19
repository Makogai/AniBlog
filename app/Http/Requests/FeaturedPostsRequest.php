<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeaturedPostsRequest extends FormRequest
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
        return $this->is('admin/posts-featured/store') ? $this->createRules() : $this->updateRules();
    }

    public function messages()
    {
        return [



        ];
    }

    public function createRules(){
        return [

            'post_id' => 'required',

        ];
    }

    public function updateRules(){
        return [
            'post_id' => 'required',
        ];
    }

}
