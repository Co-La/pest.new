<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
    
    public function messages()
    {
        parent::messages();
        return [
            'name.required' => 'Cimpul nu este completat',
            'email.email' => 'Cimpul nu este o adresa de email',
            
        ];
    }
     
    
    public function rules()
    {
        return [
            'name'     =>   'required|max:255',
            'prenume'  =>   'sometimes|required|max:255',
            'company'  =>   'sometimes|required|max:255',
            'adress'   =>   'sometimes|required|max:255',
            'email'    =>  'email|required|max:255',
            'message'  =>  'required|max:400',
            
            
        ];
    }
}
