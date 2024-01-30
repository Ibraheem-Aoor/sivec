<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Admin\CreateServiceCategoryRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateProjectCategoryRequest extends CreateProjectCategoryRequest
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
        $rules['image'] =   ['nullable'];
        $rules['name_ar']  =  ['required' ];#Rule::unique('project_category_translations' , 'name')->ignore($this->id , 'project_category_id')];
        $rules['name_en']  =  ['required' ];#, Rule::unique('project_category_translations' , 'name')->ignore($this->id , 'project_category_id')];
        return $rules;
    }
}
