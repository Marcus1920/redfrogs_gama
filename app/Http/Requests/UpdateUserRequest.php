<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateUserRequest extends Request
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
            'role'          =>'required|not_in:0',
            'title'         =>'required|not_in:0',
            'name'          =>'required',
            'surname'       =>'required',
            'language'      =>'required|not_in:0',
            'alt_email'     =>'email',
            'province'      =>'required|not_in:0',
            'municipality'  =>'required|not_in:0',
            'district'      =>'required|not_in:0',
            'position'      =>'required|not_in:0',
            'ward'          =>'required|not_in:0',
            'department'    =>'required|not_in:0',
            'status'        =>'required|not_in:0',
            'gender'        =>'required|not_in:0',
        ];
    }
}
