<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Admin\CreateServiceCategoryRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateClientRequest extends CreateClientRequest
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
        $rules['email'] .=  ','.$this->id;
        $rules['phone'] .=  ','.$this->id;
        return $rules;
    }
}
