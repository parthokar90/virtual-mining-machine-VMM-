<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class VmmValidateRequest extends FormRequest
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
            'title'=>'required',
            'winning_amount'=>'required|integer',
            'lifetime'=>'required',
            'minimum_invest'=>'required|integer',
            'distribute_coin'=>'required|integer',
            'execution_time'=>'required',
            'prepration_time'=>'required',
            'start_time'=>'required',
            'status'=>'required',
        ];
    }
}
