<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        return $this->is('admin/user/store') ? $this->createRules() : $this->updateRules();
    }

    public function messages()
    {
        return [

            'name.required'=> 'You have to enter a name',
            'image_path.mimes' => "The image must be jpeg,png,jpg,gif or svg!",
            'image_path.max'=>"The image must be below :max KB",

        ];
    }

    public function createRules(){
        return [

            'name' => 'required|max:100',
            // 'email' => 'required|email|unique',
            'image' => 'nullable|max:1000|mimes:jpeg,png,jpg,gif,svg',
        ];
    }

    public function updateRules(){
        return [
            'name' => 'nullable|max:100',
            // 'email' => 'required|email|unique',
            'image_path' => 'nullable|max:8000|mimes:jpeg,png,jpg,gif,svg',
            'email' => 'nullable',
        ];
    }

}
