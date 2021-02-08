<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'office_id' => 'required|exists:offices,id',
            'subjects' => 'required|array',
            'subjects.*' => 'exists:subjects,id',
            'class_rooms' => 'required|array',
            'class_rooms.*' => 'exists:class_rooms,id'
        ];
    }
}
