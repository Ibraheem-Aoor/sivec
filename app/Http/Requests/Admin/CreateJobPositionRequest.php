<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class CreateJobPositionRequest extends FormRequest
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
            'vacancy'  =>  'required',
            'description'  =>  'required',
            'requirements'  =>  'required|array',
            'requirements.*'  =>  'required',
            'benefits'  =>  'nullable',
            'salary'  =>  'nullable',
            'job_title_id'  =>  'required',
        ];
    }
}
