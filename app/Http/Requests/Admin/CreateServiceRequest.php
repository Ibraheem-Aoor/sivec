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
     * @return array<string, mixed>SS
     */
    public function rules()
    {
        return [
            'name'  =>  'required|unique:services,name',
            'details'  => 'required',
            'pdf'   =>  'nullable|file|mimes:pdf',
            'category_id'   =>  'required',
            'image'   =>  'required|image|mimes:jpeg,png,jpg,gif',
            'status'    =>  'required'
        ];
    }
}
