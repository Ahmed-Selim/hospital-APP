<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:4'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:4'],
            'gender' => ['required', 'in:Male,Female'],
            'profile_picture' => ['image']
        ];
    }
}
