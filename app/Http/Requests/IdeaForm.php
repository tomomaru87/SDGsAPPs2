<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IdeaForm extends FormRequest
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
            'submission_company'=>'required|string',
            'idea_name'=>'required|string',
            'number'=>'required',
            'company_image'=>'required|string',
            'idea_details'=>'required|string',
            'budget'=>'required|string',
            'target'=>'required|string',
            'marketing'=>'required|string',
            'make_person'=>'required|string',
        ];
    }
}
