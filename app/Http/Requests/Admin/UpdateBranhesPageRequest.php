<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateBranhesPageRequest extends FormRequest
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
            'ar'  =>  'sometimes|array',
            'ar.*'  =>  'required',
            'en'  =>  'sometimes|array',
            'en.*'  =>  'required',
            'address_values'    =>  'required_with:address_titles',
            'address_values.*'    =>  'required',
        ];
    }
}
