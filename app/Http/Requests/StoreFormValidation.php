<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormValidation extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|max:2000'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Please make sure you provide a valid name',
            'email.required' => 'You havent provided any email, please do that',
            'comment.required' => 'Are you going to submit an empty comment for this?'
        ];
    }
}
