<?php

namespace App\Services\Admin;

use App\Repositories\Admin\ProfileRepository;
use Throwable;
use Illuminate\Support\Facades\Hash;

class ProfileService
{
    private $profileRepository;

    public function __construct(ProfileRepository $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function update($request){
        try {
            $user = $this->profileRepository->getUser();
            $user = $this->profileRepository->update($user , $request);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.update');
            $error_no = 200;
        } catch (Throwable $e) {
            $response_data['status'] = false;
            $response_data['message'] = __('custom.smthing_wrong');
            $error_no = 500;
        }
        return [
            'response_data' => $response_data,
            'error_no' => $error_no
        ];
    }

    public function change_password($request){
        try {
            $user = $this->profileRepository->getUser();
            if(!Hash::check($request->old_password, $user->password)){
                $response_data['status'] = false;
                $response_data['message'] = __('custom.old_password_is_wrong');
                $error_no = 500;
                return [
                    'response_data' => $response_data,
                    'error_no' => $error_no
                ];
            }
            $user = $this->profileRepository->change_password($user ,$request);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.update');
            $error_no = 200;
        } catch (Throwable $e) {
            $response_data['status'] = false;
            $response_data['message'] = __('custom.smthing_wrong');
            $error_no = 500;
        }
        return [
            'response_data' => $response_data,
            'error_no' => $error_no
        ];
    }

    public function check_password($user , $request){
        return Hash::check($request->password, $user->password);
    }
}
