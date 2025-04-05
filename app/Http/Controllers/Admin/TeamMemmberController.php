<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BaseShowStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateTeamMemberRequest;
use App\Http\Requests\Admin\UpdateTeamMemberRequest;
use App\Models\TeamMember;
use App\Transformers\Admin\TeamMemberTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;
use Yajra\DataTables\Facades\DataTables;

class TeamMemmberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['table_data_url'] = route('admin.team-members.table_data');
        $data['show_statuses'] = BaseShowStatusEnum::getInstances();
        return view('admin.team_members.index', $data);
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
    public function store(CreateTeamMemberRequest $request)
    {
        try {
            $data = $request->toArray();
            $avatar_file_content = $request->file('avatar');
            $data['avatar'] = saveImage('team', $avatar_file_content);

            TeamMember::query()->create([
                'ar' => [
                    'name' => $data['name_ar'],
                    'title_position' => $data['title_position_ar'],
                ],
                'en' => [
                    'name' => $data['name_en'],
                    'title_position' => $data['title_position_en'],
                ],
                'status' => $data['status'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'facebook' => $data['facebook'],
                'instagram' => $data['instagram'],
                'twitter' => $data['twitter'],
                'linked_in' => $data['linked_in'],
                'avatar' => $data['avatar'],
            ]);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.create_success');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#team-create-update-modal';
            $error_no = 200;
        } catch (Throwable $e) {
            $response_data['status'] = false;
            $response_data['message'] = $e->getMessage(); #__('custom.something_wrong');
            $error_no = 500;
        }
        return response()->json($response_data, $error_no);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeamMemberRequest $request, $id)
    {
        try {
            $member = TeamMember::query()->find($id);
            $data = $request->toArray();
            $avatar_file_content = $request->file('avatar');
            if ($avatar_file_content) {
                $data['avatar'] = saveImage('team', $avatar_file_content);
                deleteImage($member->avatar);
            }
            $member->update([
                'ar' => [
                    'name' => $data['name_ar'],
                    'title_position' => $data['title_position_ar'],
                ],
                'en' => [
                    'name' => $data['name_en'],
                    'title_position' => $data['title_position_en'],
                ],
                'status' => $data['status'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'facebook' => $data['facebook'],
                'instagram' => $data['instagram'],
                'twitter' => $data['twitter'],
                'linked_in' => $data['linked_in'],
                'avatar' => @$data['avatar'] ?? $member->avatar,
            ]);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.updated_successs');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#team-create-update-modal';
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
            $member = TeamMember::query()->find($id);
            Storage::disk('public')->deleteDirectory('team/' . $member->id . '/');
            $member->delete();
            $respnse_data['status'] = true;
            $respnse_data['is_deleted'] = true;
            $respnse_data['message'] = __('custom.deleted_successflly');
            $respnse_data['row'] = $id;
            $error_no = 200;
        } catch (Throwable $e) {
            $respnse_data['message'] = _('custom.smth_wrong');
            $error_no = 500;
        }
        return response()->json($respnse_data, $error_no);
    }




    public function getTableData()
    {
        return DataTables::of(TeamMember::query()->orderByDesc('created_at'))
            ->setTransformer(TeamMemberTransformer::class)
            ->filterColumn('name', function ($query, $keyword) {
                $query->whereHas('translations', function ($query) use ($keyword) {
                    $query->where('name', 'like', "%$keyword%")->whereIn('locale', getAvilableLocales());
                });
            })
            ->filterColumn('title_position', function ($query, $keyword) {
                $query->whereHas('translations', function ($query) use ($keyword) {
                    $query->where('title_position', 'like', "%$keyword%")->whereIn('locale', getAvilableLocales());
                });
            })
            ->filterColumn('email', function ($query, $keyword) {
                $query->where('email', 'like', "%$keyword%");
            })
            ->filterColumn('phone', function ($query, $keyword) {
                $query->where('phone', 'like', "%$keyword%");
            })
            ->make(true);
    }

}
