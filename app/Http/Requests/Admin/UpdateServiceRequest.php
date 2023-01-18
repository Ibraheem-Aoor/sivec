<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
        $rules['image'] = 'sometimes|image|mimes:jpeg,png,jpg,gif|dimensions:min_width=400,min_height=475,max_width=400,max_height=475';
        $rules['name'] .= ','.$this->id;
        return $rules;
    }
}
