<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateClientRequest extends FormRequest
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
            'image' =>  'nullable|image|mimes:jpeg,png,jpg,gif,webp',#dimensions:min_width=80,min_height=80,max_width=80,max_height=80
            'name'  =>  'required|string',
            'email' =>  'required|email|unique:clients,email',
            'phone' =>  'required|unique:clients,phone',
        ];
    }
}
