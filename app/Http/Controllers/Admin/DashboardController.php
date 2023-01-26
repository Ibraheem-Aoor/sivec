<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Contact;
use App\Models\JobApplication;
use App\Models\JobPosition;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\TaeamMemmber;
use App\Transformers\Admin\ContactTransformer;
use App\Transformers\Admin\JobApplicationTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Throwable;
use Yajra\DataTables\DataTables;
use Analytics;
use Spatie\Analytics\Period;

class DashboardController extends Controller
{
    public function index()
    {
        $data = $this->getDashboardData();
        return view('admin.dashboard' , $data);
    }


    public function contacts()
    {
        $data['table_data_url'] = route('admin.contact.table_data');
        return view('admin.contact.index' , $data);
    }

    public function getContactTableData()
    {
        return DataTables::of(Contact::query()->orderByDesc('created_at'))
                    ->setTransformer(ContactTransformer::class)
                    ->make(true);
    }

    public function jobApplications()
    {
        $data['table_data_url'] = route('admin.job_application.table_data');
        return view('admin.job_application.index' , $data);
    }

    public function getJobApplicationsTableData()
    {
        return DataTables::of(JobApplication::query()->orderByDesc('created_at'))
                    ->setTransformer(JobApplicationTransformer::class)
                    ->make(true);
    }

    public function downloadJobApplicationCv($id)
    {
        try{
            $job_application = JobApplication::query()->find($id);
            return Storage::disk('public')->download("cv/{$job_application->id}/{$job_application->cv}");
        }catch(Throwable $e)
        {
            return back();
        }

    }


    /**
     * get the dashboard info ands statistics
     * @return void
     */
    public function getDashboardData()
    {
        if(!Cache::has('dashboard_data'))
        {
            $data['project_categories_count'] = ProjectCategory::query()->count();
            $data['projects_count'] = Project::query()->count();
            $data['service_categories_count'] = ServiceCategory::query()->count();
            $data['services_count'] = Service::query()->count();
            $data['team_members_count'] = TaeamMemmber::query()->count();
            $data['clients_count'] = Client::query()->count();
            $data['jobs_positions_count'] = JobPosition::query()->count();
            $data['job_applications_count'] = JobApplication::query()->count();
            $data['contacts_count'] = Contact::query()->count();
            Cache::put('dashboard_data' , $data);
        }else{
            $data = Cache::get('dashboard_data');
        }
        return $data;
    }


}

