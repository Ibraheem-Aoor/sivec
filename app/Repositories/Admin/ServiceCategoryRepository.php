<?php

namespace App\Repositories\Admin;

use App\Models\ServiceCategory;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServiceCategoryRepository
{

    public function getServiceCategory($id){
        return ServiceCategory::query()->find($id);
    }

    public function store($request)
    {
        return ServiceCategory::query()->create([
            'ar' => [
                'name' => $request->name_ar,
            ],
            'en' => [
                'name' => $request->name_en,
            ],
        ]);
    }

    public function update($service_category, $request)
    {
        
        return $service_category->update([
            'ar' => [
                'name' => $request->name_ar,
            ],
            'en' => [
                'name' => $request->name_en,
            ],
        ]);
    }

    public function destroy($service_category){
        return $service_category->delete();
    }
}
