<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Add extends FormRequest
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
            'name' =>'required|string',
            'email' =>'required|string',
            'idea_name'=>'required|string',
            'number'=>'required',
            'idea_details'=>'required|string',
            'budget'=>'required|string',
            'target'=>'required|string',
            'marketing'=>'required|string',
            'pdf' => 'mimes:pdf|nullable'
        ];
    }
}
