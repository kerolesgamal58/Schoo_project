<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeeRequest extends FormRequest
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
            'school_year' => 'required|in:p_first,p_second,p_third,p_fourth,p_fifth,p_sixth,s_first,s_second,s_third,h_first,h_second,h_third',
            'total' => 'required|numeric'
        ];
    }
}
