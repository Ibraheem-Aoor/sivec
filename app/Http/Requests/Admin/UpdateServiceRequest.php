<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateServiceRequest extends CreateServiceRequest
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
        $rules['image'] = 'sometimes|image|mimes:jpeg,png,jpg,gif|';
        $rules['name_ar']  =  ['required' , Rule::unique('service_translations' , 'name')->ignore($this->id , 'service_id')];
        $rules['name_en']  =  ['required' , Rule::unique('service_translations' , 'name')->ignore($this->id , 'service_id')];
        return $rules;
    }
}
