<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email'=> 'required|email|string|max:32',
            'userName' => 'required|string|max:32',
            'password' => 'required|min:8|string',
            'phoneNum' => 'required|min:11|',
            'profileId' => 'required|numeric',
            'subPlanId' => 'required|numeric',
            'sex' => 'required|string|max:8',
            'age' => 'required|min:0|max:100|numeric'           
        ];
    }
}
