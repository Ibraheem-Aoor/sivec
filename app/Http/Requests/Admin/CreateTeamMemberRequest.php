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
            'avatar'   =>   'required|image|mimes:jpeg,png,jpg,gif|dimensions:min_width=460,min_height=460,max_width=480,max_height=480',
            'name'  =>  'required|string',
            'title_position'  =>  'required|string',
            'email'  =>  'required|email|unique:team_members,email',
            'phone'  =>  'nullable|string',
            'address'  =>  'nullable|string',
            'cover_letter'  =>  'nullable',
            'personal_details'  =>  'nullable',
            'facebook'  =>  'nullable',
            'instagram'  =>  'nullable',
            'twitter'  =>  'nullable',
            'linked_in'  =>  'nullable',
            'status'    =>  'required',
        ];
    }
}
