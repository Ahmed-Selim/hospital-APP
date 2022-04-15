<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AppointmentRequest extends FormRequest
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
            "doctor_id" => ['required', Rule::exists('users', 'id')->where('role_id', 2)],
            "start_timestamp" => ['required', 'date_format:Y-m-d H:i:s', 'after_or_equal:'.now()] ,
            "end_timestamp" => ['required', 'date_format:Y-m-d H:i:s', 'after:start_timestamp'],
            "status_id" => ['required', 'exists:appointment_statuses,id'],
            "price" => ['required', 'integer', 'between:100,10000']
        ];
    }
}
