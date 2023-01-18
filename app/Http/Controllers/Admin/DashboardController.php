<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Transformers\Admin\ContactTransformer;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
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
}

