<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BaseShowStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateTeamMemberRequest;
use App\Http\Requests\Admin\UpdateTeamMemberRequest;

use App\Services\Admin\TeamMemberService;




class TeamMemmberController extends Controller
{
    private $teamMemberService;

    public function __construct(TeamMemberService $teamMemberService)
    {
        $this->teamMemberService = $teamMemberService;
    }
    public function index()
    {
        $data['table_data_url'] = route('admin.team-members.table_data');
        $data['show_statuses'] = BaseShowStatusEnum::getInstances();
        return view('admin.team_members.index', $data);
    }

    public function create()
    {
        //
    }

    public function store(CreateTeamMemberRequest $request)
    {
        $data = $this->teamMemberService->store($request);
        return response()->json($data['response_data'], $data['error_no']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(UpdateTeamMemberRequest $request, $id)
    {
        $data = $this->teamMemberService->update($request , $id);
        return response()->json($data['response_data'], $data['error_no']);
    }

    public function destroy($id)
    {
        $data = $this->teamMemberService->destroy($id);
        return response()->json($data['response_data'], $data['error_no']);
    }

    public function getTableData()
    {
        return $this->teamMemberService->getTableData();
    }
}
