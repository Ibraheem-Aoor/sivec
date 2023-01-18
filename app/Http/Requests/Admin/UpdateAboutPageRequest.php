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
            'about_image_1' =>  'sometimes|image|mimes:jpeg,png,jpg,gif|dimensions:min_width=480,min_height=565,max_width=480,max_height=565',
            'about_image_2' =>  'sometimes|image|mimes:jpeg,png,jpg,gif|dimensions:min_width=425,min_height=300,max_width=425,max_height=300',
            'about_us_text' => 'required',
            'exclusive_design_description'  =>  'required',
            'pro_team_description'  =>  'required',
            'about_us_features'  =>  'sometimes|array',
            'about_us_features.*'    =>  'required',
        ];
    }
}
