<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\Site\ContactFormRequest;
use App\Http\Requests\Site\CreateJobApplicationRequest;
use App\Models\BusinessSetting;
use App\Models\Contact;
use App\Models\Image;
use App\Models\ImageCategory;
use App\Models\JobApplication;
use App\Models\JobPosition;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use PDO;
use Termwind\Components\Dd;
use Throwable;
use App\Http\Controllers\Controller;
use App\Services\CacheService;

class HomeController extends Controller
{

    public $services,
    $contact_page_settings,
    $about_page_settings,
    $site_settings,
    $branches_page_settings,
    $image_categories,
    $meta_desc;

    public function __construct(CacheService $cacheService, Request $request)
    {
        parent::__construct($cacheService, $request);
        $this->services = $this->cache_service->rememberFromModel(key: 'home_page_services', model: Service::class, is_forever: true, conditions: [
            [
                'status',
                '=',
                true,
            ]
        ]);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $data['services'] = $this->services;
        $data['page_title'] = __('custom.site.sivec') . ' - ' . __('custom.site.Engineering Consulting');
        $data['meta_desc'] = $this->meta_desc;
        $data['projects'] = collect([]);#Project::query()->get(); #$this->setHomeProjects();
        $data['about_page_settings'] = getPageSettings('about');
        return view('site.home', $data);
    }

    public function about()
    {
        $data['page_title'] = __('custom.site.sivec') . ' - ' . __('custom.site.ABOUT');
        $data['meta_desc'] = $this->meta_desc;

        $data['page_settings'] = BusinessSetting::query()->wherePage('about')->whereLang(app()->getLocale())->pluck('value', 'key');
        return view('site.about', $data);
    }

    public function contact()
    {
        $this->contact_page_settings = getPageSettings('contact');
        $data['page_title'] = __('custom.site.sivec') . ' - ' . __('custom.site.CONTACT');
        $data['meta_desc'] = $this->meta_desc;
        $data['page_settings'] = $this->contact_page_settings;
        return view('site.contact', $data);
    }

    public function submitContact(ContactFormRequest $request)
    {
        try {
            Contact::query()->create($request->toArray());
            $respnse_data['status'] = true;
            $respnse_data['reset_form'] = true;
            $respnse_data['message'] = __('custom.contact_success_message');
            $error_no = 200;
        } catch (Throwable $e) {
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
        $data['page_title'] = __('custom.site.sivec') . ' - ' . __('custom.site.SERVICES');
        $data['meta_desc'] = $this->meta_desc;
        $data['services'] = $this->services;
        return view('site.services', $data);
    }

    public function serviceDetails($id)
    {
        $data['service'] = Service::query()->find(decrypt($id));
        $data['page_title'] = "{$data['service']->name}";
        $data['meta_desc'] = $this->meta_desc;
        $data['related_services'] = $data['service']->getRleatedServices();
        return view('site.service_details', $data);
    }
    public function servicePdf($id)
    {
        $data['service'] = Service::query()->find(decrypt($id));
        $pdf = $data['service']->pdf;
        return Storage::disk('public')->download("services/{$data['service']->id}/pdf/{$pdf}");
        return view('site.service_details', $data);
    }

    ####### END  Services #####



    ####### Start Projects #####
    public function projects()
    {
        $data['projects'] = Project::query()->whereStatus('ACTIVE')
            ->with('category')
            ->orderByDesc('projects.created_at')
            ->paginate(12);
        $data['page_title'] = __('custom.site.sivec') . ' - ' . __('custom.site.PROJECTS');
        $data['meta_desc'] = $this->meta_desc;

        return view('site.projects', $data);
    }

    public function projectDetails($id)
    {
        $data['project'] = Project::query()->find(decrypt($id));
        $data['page_title'] = "{$data['project']->name}";
        $data['meta_desc'] = $this->meta_desc;
        // $data['related_projects']   =   $data['project']->getRleatedProjects();
        return view('site.project_details', $data);
    }


    ####### End Projects #####





    ####### Start Jobs #####
    public function jobs()
    {
        $data['jobs'] = JobPosition::query()->
            whereStatus('ACTIVE')->paginate(50);
        $data['page_title'] = __('custom.site.sivec') . ' - ' . __('custom.site.JOBS');
        $data['meta_desc'] = $this->meta_desc;

        return view('site.jobs', $data);
    }

    public function jobDetails($id)
    {
        $data['job'] = JobPosition::query()
            ->with('title')
            ->findOrFail(decrypt($id));
        $data['page_title'] = "SIVEC - Jobs | " . $data['job']->title->name;
        $data['meta_desc'] = $this->meta_desc;

        $data['related_jobs'] = $data['job']->getRleatedJobs();
        return view('site.job_details', $data);
    }
    public function submitJobApplication(CreateJobApplicationRequest $request)
    {
        try {
            $data = $request->toArray();
            $cv_file_content = $request->file('cv');
            $cv_file_name = time() . '.' . $cv_file_content->getClientOriginalExtension();
            $data['cv'] = $cv_file_name;
            $application = JobApplication::query()->create($data);
            $cv_file_content->storeAs("public/cv/{$application->id}/", $cv_file_name);
            $respnse_data['status'] = true;
            $respnse_data['reset_form'] = true;
            $respnse_data['message'] = __('custom.applicaion_success_message');
            $error_no = 200;
        } catch (Throwable $e) {
            $respnse_data['status'] = false;
            $respnse_data['reset_form'] = false;
            $respnse_data['message'] = __('custom.smthing_wrong');
            $error_no = 500;
        }
        return response()->json($respnse_data, $error_no);
    }
    ####### End Jobs #####





    ####### Start Branches #####
    public function branches()
    {
        $this->branches_page_settings = getPageSettings('branches');
        $data['page_title'] = __('custom.site.sivec') . ' - ' . __('custom.site.BRANCHES');
        $data['meta_desc'] = $this->meta_desc;
        $data['page_settings'] = $this->branches_page_settings;
        $addres_titles = json_decode(@$data['page_settings']['address_titles'], true) ?? [];
        $addres_values = json_decode(@$data['page_settings']['address_values'], true);
        $data['addresses'] = [];
        $i = 0;
        foreach ($addres_titles as $address) {
            array_push($data['addresses'], ['title' => $address, 'value' => @$addres_values[$i++]]);
        }
        return view('site.branches', $data);
    }
    ####### End Branches #####











    /**
     * gallery parent categories to show in navBar.
     */
    public function setHomeProjects()
    {
        return Cache::rememberForever('home_projects', function () {
            return Project::query()->whereStatus('ACTIVE')->inRandomOrder()->orderBy('created_at', 'desc')->limit(20)->get();
        });
    }






    public function setIcons()
    {
        $servies = Service::query()->orderByDesc('created_at')->get();
        $icons = [
            'fa fa-palette',
            'fa fa-briefcase',
            'fa fa-certificate',
            'fa fa-list',
            'fa fa-city',
            'fa fa-sitemap',
        ];
        for ($i = 0; $i < count($servies); $i++) {
            $servies[$i]->icon = $icons[$i];
            $servies[$i]->save();
        }
        dd($servies);
    }


    public function gallery($category_id)
    {
        $category = ImageCategory::query()->findOrFail(decrypt($category_id));
        $data['page_title'] = __('custom.site.sivec') . ' - ' . __('custom.site.DESINGS');
        " - {$category->getFullTitle()}";
        $data['meta_desc'] = $this->meta_desc;

        $data['page_settings'] = BusinessSetting::query()->wherePage('about')->pluck('value', 'key');
        $data['images'] = Image::query()->where('image_category_id', $category->id)->latest()->paginate(20);
        $data['is_interior_caetegory'] = $category->parent_id == 9;
        $data['footer_disabled'] = true;
        $data['buildings_gallery'] = decrypt($category_id) == 7;
        $view = view('site.gallery', $data)->render();
        return $view;
    }





    /**
     * Newly Added Ramdan Section
     */
    public function ramadan()
    {
        $data['page_title'] = __('custom.site.sivec') . ' - ' . __('custom.site.RAMADAN');
        $data['meta_desc'] = "SEVIC RAMDAN 2023";
        return view('site.ramadan', $data);
    }

    public function saveImagesToDB(Request $request, $id)
    {
        $path = 'gallery/' . $id;
        if ($request->query('token') != '!!!') {
            return back();
        }
        // if (Image::where('image_category_id', $id)->exists()) {
        //     dd('DONE ALREADY');
        // }
        $db_category = ImageCategory::query()->find($id);
        if($db_category->parent_id != null)
        {
            $path = 'gallery/' . $db_category->parent_id .'/'.$id;
        }
        if (!isset($db_category)) {
            ImageCategory::query()->create([
                'id' => $id,
                'en' => [
                    'name' => $request->name_en,
                ],
                'ar' => [
                    'name' => $request->name_ar,
                ]
            ]);
        }
        $category = Storage::disk('public')->files($path);
        foreach ($category as $image) {
            $name = basename($image);
            Image::query()->updateOrCreate([
                'name' => $name,
                'image_category_id' => $id,
            ], [
                'name' => $name,
                'image_category_id' => $id,
            ]);
        }
        dd('Done');
    }

    function getPageSettings($page = null)
    {
        // dd(app()->getLocale());
        // dd(BusinessSetting::wherePage('about')->whereLang('ar')->pluck('value', 'key'));
        return Cache::rememberForEver($page . '_' . getCurrentLocale(), function () use ($page) {
            return BusinessSetting::query()->wherePage($page)->whereLang(getCurrentLocale())->pluck('value', 'key');
        });
    }


}
