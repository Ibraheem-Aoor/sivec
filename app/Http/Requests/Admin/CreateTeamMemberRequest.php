<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateTeamMemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return  Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'avatar'   =>   'required|image|mimes:jpeg,png,jpg,gif,webp',#dimensions:min_width=460,min_height=460,max_width=480,max_height=480
            'name_ar'  =>  'required|string',
            'name_en'  =>  'required|string',
            'title_position_ar'  =>  'required|string',
            'title_position_en'  =>  'required|string',
            'email'  =>  'required|email|unique:team_members,email',
            'phone'  =>  'nullable|string',
            'status'    =>  'required',
            'address_ar'  =>  'nullable|string',
            'address_en'  =>  'nullable|string',
            'facebook'  =>  'nullable',
            'instagram'  =>  'nullable',
            'twitter'  =>  'nullable',
            'linked_in'  =>  'nullable',
            'cover_letter_ar'  =>  'nullable',
            'cover_letter_en'  =>  'nullable',
            'personal_details_ar'  =>  'nullable',
            'personal_details_en'  =>  'nullable',
        ];
    }
}
