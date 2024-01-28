<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BaseShowStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateServiceCategoryRequest;
use App\Http\Requests\Admin\CreateTeamMemberRequest;
use App\Http\Requests\Admin\CreateUpdateProjectStyleAndTypeRequest;
use App\Http\Requests\Admin\UpdateServiceCategoryRequest;
use App\Http\Requests\Admin\UpdateTeamMemberRequest;
use App\Models\ProjectStyle;
use App\Models\ServiceCategory;
use App\Models\TaeamMemmber;
use App\Services\ArtisanService;
use App\Services\CacheService;
use App\Transformers\Admin\TeamMemberTransformer;
use App\Transformers\ServiceCategoryTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;
use Yajra\DataTables\Facades\DataTables;
use App\Models\ProjectType;
use App\Transformers\Admin\ProjectStyleAndTypeTransformer;

class ProjectTypeAndStyleController extends Controller
{
    protected $model;
    public function __construct(CacheService $cache_service, Request $request)
    {
        parent::__construct($cache_service, $request);
        $this->model = resolve($this->request->query('model') == 'ProjectType' ? (ProjectType::class) : (ProjectStyle::class));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['table_data_url'] = route('admin.project-style-type.table_data', ['model' => $this->request->query('model')]);
        $data['model'] = $this->request->query('model');
        $data['page_title_2'] = $this->model?->getPageTitle();
        return view('admin.project_style_type.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUpdateProjectStyleAndTypeRequest $request)
    {
        try {
            $data = $request->toArray();
            $this->model::query()->create([
                'ar' => [
                    'name' => $data['name_ar'],
                ],
                'en' => [
                    'name' => $data['name_en'],
                ],
            ]);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.create_success');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#project-style-type-create-update-modal';
            $error_no = 200;
        } catch (Throwable $e) {
            $response_data['status'] = false;
            $response_data['message'] = $e->getMessage();
            $error_no = 500;
        }
        return response()->json($response_data, $error_no);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUpdateProjectStyleAndTypeRequest $request, $id)
    {
        try {
            $data = $request->toArray();
            $model_to_find = $this->model::query()->find($id);
            $model_to_find->update([
                'ar' => [
                    'name' => $data['name_ar'],
                ],
                'en' => [
                    'name' => $data['name_en'],
                ],
            ]);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.updated_successs');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#project-style-type-create-update-modal';
            $error_no = 200;
        } catch (Throwable $e) {
            $response_data['status'] = false;
            $response_data['message'] = $e->getMessage(); #__('custom.something_wrong');
            $error_no = 500;
        }
        return response()->json($response_data, $error_no);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->model::query()->find($id)->delete();
            $respnse_data['is_deleted'] = true;
            $respnse_data['message'] = __('custom.deleted_successflly');
            $respnse_data['row'] = $id;
            $error_no = 200;
        } catch (Throwable $e) {
            dd($e);
            $respnse_data['message'] = _('custom.smth_wrong');
            $error_no = 500;
        }
        return response()->json($respnse_data, $error_no);
    }



    public function getTableData()
    {
        return DataTables::of($this->model::query())
            ->setTransformer(ProjectStyleAndTypeTransformer::class)
            ->filterColumn('name', function ($query, $keyword) {
                $query->whereHas('translations', function ($query) use ($keyword) {
                    $query->where('name', 'like', "%$keyword%")->whereIn('locale', getAvilableLocales());
                });
            })
            ->make(true);
    }

}
