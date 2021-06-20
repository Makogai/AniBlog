<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FooterRequest extends FormRequest
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
        return $this->is('admin/footer/store') ? $this->createRules() : $this->updateRules();
    }

    public function messages()
    {
        return [



        ];
    }

    public function createRules(){
        return [

            'image' => 'required|max:5000|mimes:jpeg,png,jpg,svg',
            'title' => 'required|max:100',
            'copyright' => 'required|max:100',

        ];
    }

    public function updateRules(){
        return [
            'image' => 'nullable|max:5000|mimes:jpeg,png,jpg,svg',
            'title' => 'required|max:100',
            'copyright' => 'required|max:100',
        ];
    }

}
