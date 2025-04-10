<?php

namespace App\Services\Admin;

use App\Repositories\Admin\ClientRepository;
use Yajra\DataTables\Facades\DataTables;
use Throwable;

class ClientService
{
    protected $clientRepository;
    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function store($request)
    {
        try {
            $client = $this->clientRepository->store($request);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.create_success');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#client-create-update-modal';
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
            $client = $this->clientRepository->getClient($id);
            $client = $this->clientRepository->update($client , $request);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.update');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = false;
            $response_data['modal_to_hiode'] = '#client-create-update-modal';
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
            $client = $this->clientRepository->getClient($id);
            $client = $this->clientRepository->destroy($client);
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
        $clients = $this->clientRepository->getClients();
        return DataTables::of($clients)
            ->addColumn('actions', function ($client) {
                return view('admin.client.actions', compact('client'));
            })
            ->addColumn('image', function ($client) {
                return view('admin.client.image', compact('client'));
            })
            ->make(true);
    }
}
