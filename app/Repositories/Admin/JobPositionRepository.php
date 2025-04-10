<?php

namespace App\Repositories\Admin;

use App\Models\JobPosition;
use App\Models\JobTitle;

class JobPositionRepository
{
    public function getJobPosition($id)
    {
        return JobPosition::find($id);
    }

    public function getAllJobPositions()
    {
        return JobPosition::query()
            ->with('title')
            ->orderByDesc('job_positions.created_at')->get();
    }

    public function getAllJobTitles()
    {
        return JobTitle::query()->get();
    }

    public function store($request)
    {
        return JobPosition::create([
            'job_title_id' => $request->job_title_id,
            'vacancy' => $request->vacancy,
            'salary' => $request->salary,
            'status' => $request->status,
            'is_salary_visible' => $request->is_salary_visible == 'on' ? 1 : 0,
            'description' => $request->description,
            'requirements' => json_encode($request->requirements),
            'benefits' => json_encode($request->benefits),
        ]);
    }

    public function update($jobPosition, $request)
    {
        $jobPosition->job_title_id = $request->job_title_id;
        $jobPosition->vacancy = $request->vacancy;
        $jobPosition->salary = $request->salary;
        $jobPosition->status = $request->status;
        $jobPosition->description = $request->description;
        $jobPosition->requirements = json_encode($request->requirements);
        $jobPosition->benefits = json_encode($request->benefits);
        if ($request->is_salary_visible) {
            $jobPosition->is_salary_visible = $request->is_salary_visible == 'on' ? 1 : 0;
        }
        return $jobPosition->save();
    }

    public function destroy($job_position){
        return $job_position->delete();
    }
}
