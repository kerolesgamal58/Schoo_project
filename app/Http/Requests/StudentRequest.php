<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required_without:id',
            'phone' => 'required|numeric',
            'payed' => 'required|numeric',
            'subjects' => 'required|exists:subjects,id',
            'school_year_id' => 'required|numeric',
            'class_room_id' => 'required|numeric',
        ];
    }
}
