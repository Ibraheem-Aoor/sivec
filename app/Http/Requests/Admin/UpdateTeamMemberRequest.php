<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateTeamMemberRequest extends CreateTeamMemberRequest
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
        $rules = parent::rules();
        $rules['avatar'] =  'sometimes|image|mimes:jpeg,png,jpg,gif';#dimensions:min_width=460,min_height=460,max_width=480,max_height=480'
        $rules['email'] = 'required|email|unique:team_members,email,'.$this->id;
        return $rules;
    }
}
