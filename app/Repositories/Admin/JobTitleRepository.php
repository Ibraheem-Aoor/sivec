<?php

namespace App\Repositories\Admin;

use App\Models\BusinessSetting;
use App\Models\JobTitle;
use Illuminate\Support\Facades\Storage;

class JobTitleRepository
{
    public function getAllJobTitles(){
        return JobTitle::query()->orderByDesc('created_at')->get();
    }
    public function getJobTitle($id){
        return JobTitle::find($id);
    }
    public function store($request){
        return JobTitle::create([
            'name' => $request->name,
        ]);
    }

    public function update($jobTitle , $request){
        return $jobTitle->update([
            'name' => $request->name,
        ]);
    }

    public function destroy($jobTitle){
        return $jobTitle->delete();
    }
}
