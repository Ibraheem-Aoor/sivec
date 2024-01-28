<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateProjectCategoryRequest extends BaseAdminRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'image' =>  'required|image',
            'name_ar' => 'required|unique:project_category_translations,name',
            'name_en' => 'required|unique:project_category_translations,name',
        ];
    }
}
