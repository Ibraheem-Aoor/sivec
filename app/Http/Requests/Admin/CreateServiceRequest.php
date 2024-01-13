<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateServiceRequest extends FormRequest
{

    protected $stopOnFirstFailure = true;
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
            'name_ar'  =>  'required|unique:service_translations,name',
            'name_en'  =>  'required|unique:service_translations,name',
            'pdf'   =>  'nullable|file|mimes:pdf',
            'category_id'   =>  'required',
            'image'   =>  'required|image|mimes:jpeg,png,jpg,gif',
            'status'    =>  'required',
            'details_ar'  => 'required',
            'details_en'  => 'required',
        ];
    }
}
