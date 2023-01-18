<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class CreateProjectRequest extends FormRequest
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
        $images_required = Route::currentRouteName() == 'admin.project.custom_update' ? 'nullable' : 'required';
        return [
            'image'   =>  $images_required.'|image|mimes:jpeg,png,jpg,gif|dimensions:min_width=1280,min_height=640,max_width=1340,max_height=720',
            'home_image'   =>  $images_required.'|image|mimes:jpeg,png,jpg,gif|dimensions:min_width=400,min_height=475,max_width=400,max_height=475',
            'budget'  => 'nullable',
            'basic_info'    =>  'required',
            'challenge'    =>  'nullable',
            'result'    =>  'nullable',
            'achieve_date'  =>  'required',
            'category_id'   =>  'required',
            'client_id'   =>  'required',
        ];
    }
}
