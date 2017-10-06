<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            
            'registered'=>  'required|max:20',
            'code'      =>  'required|unique:products|max:20',
            'level'     =>  'required|max:2',
            'name'      =>  'required|unique:products|max:100',
            'substance' =>  'required|max:100',
            'used'      =>  'required|max:1',   
            'price'     =>  'required|max:10',
            'curr'      =>  'required|max:5',
            'pack'      =>  'required|max:10'
            
        ];
    }
}
