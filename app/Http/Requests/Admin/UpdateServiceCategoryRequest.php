<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Admin\CreateServiceCategoryRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateServiceCategoryRequest extends CreateServiceCategoryRequest
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
            'name_ar'  =>  ['required' , Rule::unique('service_category_translations' , 'name')->ignore($this->id , 'service_category_id')],
            'name_en'  =>  ['required' , Rule::unique('service_category_translations' , 'name')->ignore($this->id , 'service_category_id')],
        ];
    }
}
