<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'  =>  'required|unique:service,name',
            'details'  => 'required',
            'pdf'   =>  'nullable',
            'category_id'   =>  'required',
            'outer_image'   =>  'required|image|mimes:jpeg,png,jpg,gif|dimensions:min_width=460,min_height=460,max_width=480,max_height=480',
            'outer_image'   =>  'required|image|mimes:jpeg,png,jpg,gif|dimensions:min_width=460,min_height=460,max_width=480,max_height=480',
            'status'    =>  'required'
        ];
    }
}
