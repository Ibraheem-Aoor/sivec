<?php

namespace App\Http\Controllers;

use App\Http\Requests\Site\ContactFormRequest;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Throwable;

class HomeController extends Controller
{

    public $services;

    public function __construct()
    {
        $this->services = $this->getHomeServices();
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $data['services'] = $this->services;
        $data['page_title'] = "SEVIC - Interior & Architecture";
        return view('site.home' , $data);
    }

    public function about()
    {
        $data['page_title'] = "SEVIC - About us";
        return view('site.about' , $data);
    }

    public function contact()
    {
        $data['page_title'] = "SEVIC - Contact Us";
        return view('site.contact' , $data);
    }

    public function submitContact(ContactFormRequest $request)
    {
        try{
            Contact::query()->create($request->toArray());
            $respnse_data['status'] = true;
            $respnse_data['reset_form'] = true;
            $respnse_data['message'] = __('custom.contact_success_message');
            $error_no = 200;
        }catch(Throwable $e)
        {
            $respnse_data['status'] = false;
            $respnse_data['reset_form'] = false;
            $respnse_data['message'] = __('custom.smthing_wrong');
            $error_no = 500;
        }
        return response()->json($respnse_data, $error_no);
    }


    ####### Start Services #####

    public function services()
    {
        $data['page_title'] = "Services";
        $data['services'] = Service::query()
            ->whereStatus('ACTIVE')
            ->with('category')
            ->orderByDesc('services.created_at')->paginate(10);
        return view('site.services' , $data);
    }

    public function serviceDetails($id)
    {
        $data['service'] = Service::query()->find(decrypt($id));
        $data['page_title'] = "{$data['service']->name}";
        $data['related_services'] = $data['service']->getRleatedServices();
        return view('site.service_details' , $data);
    }
    public function servicePdf($id)
    {
        $data['service'] = Service::query()->find(decrypt($id));
        $pdf = $data['service']->pdf;
        return Storage::disk('public')->download("services/{$data['service']->id}/pdf/{$pdf}");
        return view('site.service_details' , $data);
    }

    ####### END  Services #####



    ####### Start Projects #####
    public function projects()
    {
        $data['projects'] = Project::query()->whereStatus('ACTIVE')
            ->with('category')
            ->orderByDesc('projects.created_at')
            ->paginate(12);
        $data['page_title'] = "Projects";
        return view('site.projects', $data);
    }

    public function projectDetails($id)
    {
        $data['project'] = Project::query()->with(['category' , 'client'])->find(decrypt($id));
        $data['page_title'] = "{$data['project']->name}";
        $data['related_projects']   =   $data['project']->getRleatedProjects();
        return view('site.project_details' , $data);
    }


    ####### End Projects #####


    protected function getHomeServices()
    {
        if(Cache::has('home_page_services'))
        {
            $services = Cache::get('home_page_services');
        }else{
            $home_page_services =   Service::query()->orderByDesc('created_at')->limit(4)->get();
            $services = Cache::put('home_page_services' , $home_page_services);
        }
        return $services;
    }



}
