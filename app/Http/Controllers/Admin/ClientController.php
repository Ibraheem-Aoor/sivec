<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BaseShowStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateClientRequest;
use App\Http\Requests\Admin\CreateServiceCategoryRequest;
use App\Http\Requests\Admin\CreateTeamMemberRequest;
use App\Http\Requests\Admin\UpdateClientRequest;
use App\Http\Requests\Admin\UpdateServiceCategoryRequest;
use App\Http\Requests\Admin\UpdateTeamMemberRequest;
use App\Models\Client;
use App\Models\ServiceCategory;
use App\Models\TaeamMemmber;
use App\Services\Admin\ClientService;
use App\Transformers\Admin\TeamMemberTransformer;
use App\Transformers\ClientTransformer;
use App\Transformers\ServiceCategoryTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;
use Yajra\DataTables\Facades\DataTables;

class ClientController extends Controller
{
    private $clientService;
    public function __construct(ClientService $clientService){
        $this->clientService = $clientService;
    }
    public function index()
    {
        $data['table_data_url'] = route('admin.client.table_data');
        return view('admin.client.index', $data);
    }

    public function create()
    {
        //
    }

    public function store(CreateClientRequest $request)
    {
        $data = $this->clientService->store($request);
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

    public function update(UpdateClientRequest $request, $id)
    {
        $data = $this->clientService->update($request , $id);
        return response()->json($data['response_data'], $data['error_no']);
    }

    public function destroy($id)
    {
        $data = $this->clientService->destroy($id);
        return response()->json($data['response_data'], $data['error_no']);
    }



    public function getTableData()
    {
        return $this->clientService->getTableData();
    }

}
