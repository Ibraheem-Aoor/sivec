<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileInfoRequest;
use App\Http\Requests\Admin\ProfilePasswordRequest;
use App\Services\Admin\ProfileService;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
    //
    private $profileService;
    public function __construct(ProfileService $profileService){
        $this->profileService = $profileService;
    }
    public function index(){
        return view('admin.profile.profile');
    }

    public function update(ProfileInfoRequest $request){
        $data = $this->profileService->update($request);
        return response()->json($data['response_data'], $data['error_no']);
    }

    public function changePassword(ProfilePasswordRequest $request){
        $data = $this->profileService->change_password($request);
        return response()->json($data['response_data'], $data['error_no']);
    }
}
