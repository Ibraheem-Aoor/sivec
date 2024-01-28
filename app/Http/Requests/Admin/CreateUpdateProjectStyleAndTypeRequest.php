<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use Str;

class CreateUpdateProjectStyleAndTypeRequest extends FormRequest
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
        $table_entity_name = strtolower(Str::snake($this->query('model')));
        $table_name = $table_entity_name . '_translations';
        $name_validation = [
            'required',
            'string',
        ];
        $name_validation[] = Rule::unique($table_name, 'name')->ignore(@$this->id, $table_entity_name.'_id');

        return [
            'name_ar' => $name_validation,
            'name_en' => $name_validation,
        ];
    }
}
