<?php

namespace App\Services\Admin;

use App\Repositories\Admin\TeamMemberRepository;
use Yajra\DataTables\Facades\DataTables;
use Throwable;

class TeamMemberService
{
    protected $teamMemberRepository;
    public function __construct(TeamMemberRepository $teamMemberRepository)
    {
        $this->teamMemberRepository = $teamMemberRepository;
    }

    public function store($request)
    {
        try {
            $member = $this->teamMemberRepository->store($request);
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
        return [
            'response_data' => $response_data,
            'error_no' => $error_no
        ];
    }

    public function update($request, $id)
    {
        try {
            $member = $this->teamMemberRepository->getTeamMember($id);
            $member = $this->teamMemberRepository->update($member, $request);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.update');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#team-create-update-modal';
            $error_no = 200;
        } catch (Throwable $e) {
            $response_data['status'] = false;
            $response_data['message'] = $e->getMessage(); #__('custom.something_wrong');
            $error_no = 500;
        }
        return [
            'response_data'=>$response_data, 
            'error_no'=>$error_no
        ];
    }

    public function destroy($id)
    {
        try {
            $member = $this->teamMemberRepository->getTeamMember($id);
            $member = $this->teamMemberRepository->destroy($member);
            $response_data['status'] = true;
            $response_data['is_deleted'] = true;
            $response_data['message'] = __('custom.deleted_successflly');
            $response_data['row'] = $id;
            $error_no = 200;
        } catch (Throwable $e) {
            $response_data['message'] = _('custom.smth_wrong');
            $error_no = 500;
        }
        return [
            'response_data'=>$response_data, 
            'error_no'=>$error_no
        ];
    }

    public function getTableData()
    {
        $members = $this->teamMemberRepository->getTeamMembers();
        return DataTables::of($members)
            ->addColumn('avatar', function ($member) {
                return view('admin.team_members.avatar', compact('member'));
            })
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
            ->addColumn('title_position', function ($member) {
                return $member->translate()->title_position;
            })
            ->addColumn('actions', function ($member) {
                return view('admin.team_members.actions', compact('member'));
            })
            ->make(true);
    }
}
