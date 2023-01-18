<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateContactPageRequest extends FormRequest
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
            'google_map_url'   =>  'required',
            'address_titles'  =>  'sometimes|array',
            'address_titles.*'  =>  'required',
            'address_values'    =>  'required_with:address_titles',
            'address_values.*'    =>  'required',
        ];
    }
}
