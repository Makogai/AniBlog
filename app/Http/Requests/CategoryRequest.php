<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        return $this->is('admin/category/store') ? $this->createRules() : $this->updateRules();
    }

    public function messages()
    {
        return [



        ];
    }

    public function createRules(){
        return [

            'name' => 'required|max:100',

        ];
    }

    public function updateRules(){
        return [
            'name' => 'required|max:100',
        ];
    }

}
