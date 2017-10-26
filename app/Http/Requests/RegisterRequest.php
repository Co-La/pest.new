<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * 'dose', 'exit_date', '', 'parasite_id', '', 'product_id', 'method_id'
     */
    public function rules()
    {
        return [
            'dose'              => 'required|max:25',
            'exit_date'         => 'required|max:20',
            'last_utilization'  => 'required|max:20',
            'culture_id'        => 'required',
            'method_id'         => 'required'
        ];
    }
}
