<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FooterIconRequest extends FormRequest
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
        return $this->is('admin/footer-icon/store') ? $this->createRules() : $this->updateRules();
    }

    public function messages()
    {
        return [



        ];
    }

    public function createRules(){
        return [

            'icon' => 'required',
            'link' => 'required|url|max:100',

        ];
    }

    public function updateRules(){
        return [
            'icon' => 'required',
            'link' => 'required|url|max:100',
        ];
    }

}
