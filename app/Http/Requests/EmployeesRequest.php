<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $request = \Request::instance();
        $employee_id = $request->input('id', 0);

        return [
            'first_name'=>'',
            'last_name'=>'',
            'phone'=>[
                'required',
                'regex:/^0[0-9]{9}$/',
                'phone',
                Rule::unique(config('app.employee_table'))->ignore($employee_id)
            ],
            'email' => [
                'required',
                'max:100',
                'email',
                Rule::unique(config('app.employee_table'))->ignore($employee_id)
            ],
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
