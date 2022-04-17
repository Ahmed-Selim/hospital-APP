<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:4'],
            'email' => ['required', 'email'] ,
            'password' => ['required', 'string', 'min:4'],
            'gender' => ['required', Rule::in(['Male', 'Female'])] ,
            'doctor_spec_id' => ['nullable', Rule::exists('specializations','id')],
            'profile_picture' => ['nullable', 'image'],
            'doctor_licence_no' => ['nullable', 'string', 'min:5'],
            'bio' => ['nullable', 'string']
        ];
    }
}
