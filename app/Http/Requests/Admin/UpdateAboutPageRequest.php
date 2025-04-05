<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateAboutPageRequest extends FormRequest
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
            'about_image_1' => 'sometimes|image|mimes:jpeg,png,jpg,gif|',
            'about_image_2' => 'sometimes|image|mimes:jpeg,png,jpg,gif|',
            'settings_ar' => 'required|array',
            'settings_ar.*' => 'required',
            'settings_en' => 'required|array',
            'settings_en.*' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'settings_ar.*' => __('validation.attriubtes.settings_ar.*'),
            'settings_en.*' => __('validation.attriubtes.settings_en.*'),
        ];
    }
}
