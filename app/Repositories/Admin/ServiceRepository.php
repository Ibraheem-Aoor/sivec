<?php

namespace App\Repositories\Admin;

use App\Models\ServiceCategory;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServiceRepository
{
    public function getAllServicesCategory()
    {
        return ServiceCategory::query()->get();
    }

    function getService($id){
        return Service::query()->find($id);
    }

    public function store($request)
    {
        $image_file_content = $request->image;
        $imageName = time() . '.' . $image_file_content->getClientOriginalExtension();
        $image_file_content->storeAs('uploads/services', $imageName, ['disk' => 'uploads']);
        if($request->pdf){
            $pdf_file_content = $request->pdf;
            $pdfName = time() . '.' . $pdf_file_content->getClientOriginalExtension();
            $pdf_file_content->storeAs('uploads/services', $pdfName, ['disk' => 'uploads']);
        }
        return Service::query()->create([
            'ar' => [
                'name' => $request->name_ar,
                'details' => $request->details_ar,
            ],
            'en' => [
                'name' => $request->name_en,
                'details' => $request->details_en,
            ],
            'image' => $imageName,
            'pdf' => $pdfName ?? null,
            'category_id' => $request->category_id,
        ]);
    }

    public function update($service, $request)
    {
        
            if ($request->file('image')) {
                Storage::disk('uploads')->delete('uploads/services/' . $service->image);
                $image_file_content = $request->image;
                $imageName = time() . '.' . $image_file_content->getClientOriginalExtension();
                $image_file_content->storeAs('uploads/services', $imageName, ['disk' => 'uploads']);
            }
            if ($request->file('pdf')) {
                if ($service->pdf) {
                    Storage::disk('uploads')->delete('uploads/services/' . $service->pdf);
                }
                $pdf_file_content = $request->pdf;
                $pdfName = time() . '.' . $pdf_file_content->getClientOriginalExtension();
                $pdf_file_content->storeAs('uploads/services', $pdfName, ['disk' => 'uploads']);
                
            }
            $service->update([
                'ar' => [
                    'name' => $request->name_ar,
                    'details' => $request->details_ar,
                ],
                'en' => [
                    'name' => $request->name_en,
                    'details' => $request->details_en,
                ],
                'image' => $imageName ?? $service->image,
                'pdf' => $pdfName ?? $service->pdf,
                'category_id' => $request->category_id,
                'status' => $request->status ?? $service->status,
            ]);
        return $service;
    }

    public function destroy($service){
        Storage::disk('uploads')->delete('uploads/services/' . $service->image);
        if ($service->pdf) {
            Storage::disk('uploads')->delete('uploads/services/' . $service->pdf);
        }
        return $service->delete();
    }
}
