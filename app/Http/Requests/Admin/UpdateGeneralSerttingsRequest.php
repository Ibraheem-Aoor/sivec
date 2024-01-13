<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateGeneralSerttingsRequest extends FormRequest
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
            'main_address'   =>  'required',
            'phone_number'   =>  'required',
            'company_email'             =>  'required',
            'short_description'     => 'required',
            'facebook'      =>  'nullable',
            'instagram'      =>  'nullable',
            'twitter'      =>  'nullable',
            'linked_in'      =>  'nullable',
            'tiktok'      =>  'nullable',
        ];
    }
}
