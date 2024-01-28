<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BaseShowStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateProjectCategoryRequest;
use App\Http\Requests\Admin\CreateServiceCategoryRequest;
use App\Http\Requests\Admin\CreateTeamMemberRequest;
use App\Http\Requests\Admin\UpdateProjectCategoryRequest;
use App\Http\Requests\Admin\UpdateServiceCategoryRequest;
use App\Http\Requests\Admin\UpdateTeamMemberRequest;
use App\Models\ProjectCategory;
use App\Models\ServiceCategory;
use App\Models\TaeamMemmber;
use App\Transformers\Admin\TeamMemberTransformer;
use App\Transformers\ProjectCategoryTransformer;
use App\Transformers\ServiceCategoryTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;
use Yajra\DataTables\Facades\DataTables;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['table_data_url'] = route('admin.project-category.table_data');
        $data['show_statuses'] = BaseShowStatusEnum::getInstances();
        $data['categories'] = ProjectCategory::query()->get();
        // dd($data['categories']);
        return view('admin.project_category.index', $data);
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
    public function store(CreateProjectCategoryRequest $request)
    {
        try {
            $data = $request->toArray();
            $project_category = ProjectCategory::query()->create([
                'ar' => [
                    'name' => $data['name_ar'],
                ],
                'en' => [
                    'name' => $data['name_en'],
                ],
                'image' => saveImage("project_category", $request->file('image')),
                'parent_id' => $data['project_category_id'],
            ]);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.create_success');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#project-category-create-update-modal';
            $response_data['html_element_to_change_content'] = '#project_category_id';
            $response_data['html_element_new_content'] = $this->getCategoriesSelectElement();
            $error_no = 200;
            $this->cache_service->forget('project_parent_categories');
        } catch (Throwable $e) {
            $response_data['status'] = false;
            $response_data['message'] = $e->getMessage();
            $error_no = 500;
        }
        return response()->json($response_data, $error_no);
    }

    public function getCategoriesSelectElement()
    {
        $html = "";
        ProjectCategory::query()->chunk(10, function ($categories) use (&$html) {
            foreach ($categories as $category) {
                $html .= "<option value='" . $category->id . "'>" . $category->name . "</option>";
            }
        });
        return $html;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectCategoryRequest $request, $id)
    {
        try {
            $project_category = ProjectCategory::query()->find($id);
            $data = $request->toArray();
            $project_category->update([
                'ar' => [
                    'name' => $data['name_ar'],
                ],
                'en' => [
                    'name' => $data['name_en'],
                ],
                'image' => $request->hasFile('image') ? saveImage('project_category', $request->file('image')) : $project_category->image,
                'parent_id' => $data['project_category_id'],

            ]);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.updated_successs');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#project-category-create-update-modal';
            $error_no = 200;
            $this->cache_service->forget('project_parent_categories');
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
            $service_category = ProjectCategory::query()->find($id);
            $service_category->delete();
            $respnse_data['status'] = true;
            $respnse_data['is_deleted'] = true;
            $respnse_data['message'] = __('custom.deleted_successflly');
            $respnse_data['row'] = $id;
            $error_no = 200;
            $this->cache_service->forget('project_parent_categories');
        } catch (Throwable $e) {
            dd($e);
            $respnse_data['message'] = _('custom.smth_wrong');
            $error_no = 500;
        }
        return response()->json($respnse_data, $error_no);
    }



    public function getTableData()
    {
        return DataTables::of(ProjectCategory::query()->orderByDesc('created_at'))
            ->setTransformer(ProjectCategoryTransformer::class)
            ->filterColumn('name', function ($query, $keyword) {
                $query->whereHas('translations', function ($query) use ($keyword) {
                    $query->where('name', 'like', "%$keyword%")->whereIn('locale', getAvilableLocales());
                });
            })->orderColumn('status', function ($query, $order) {
                return $query->orderBy('status', $order);
            })
            ->make(true);
    }

}
