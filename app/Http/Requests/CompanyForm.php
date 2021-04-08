<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyForm extends FormRequest
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
            
        'company_name'=>'required|string|max:30',
        'company_contents'=>'required|string',
        'company_mail'=>'required|email',
        'link'=>'url|nullable',
        'msg'=>'required',
        'password'=>'required|min:8',
        'pj_name'=>'required',
        'created'=>'nullable',
        'history'=>'nullable'



        ];
    }
}
