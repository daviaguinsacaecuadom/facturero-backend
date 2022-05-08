<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillingRequest extends FormRequest
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
            'user_id' => 'required',
            'type' => 'required|unique:users',
            'num_invoice' => 'required|min:0',
            'status' => 'required',
            'mount'=>'required|numeric|min:0'
        ];
    }
}
