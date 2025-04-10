<?php

namespace App\Repositories\Admin;

use App\Models\ServiceCategory;
use App\Models\Service;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ClientRepository
{
    public function getClients()
    {
        return Client::query()->orderByDesc('created_at');
    }
    public function getClient($id)
    {
        return Client::find($id);
    }
    public function store($request)
    {
        if ($request->hasFile('image')) {
            $image_file_content = $request->image;
            $imageName = time() . '.' . $image_file_content->getClientOriginalExtension();
            $image_file_content->storeAs('uploads/clients', $imageName, ['disk' => 'uploads']);
        }
        return Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $imageName,
            'phone' => $request->phone,
        ]);
    }

    public function update($client, $request)
    {
        if ($request->image) {
            Storage::disk('uploads')->delete('uploads/clients/' . $client->image);
            $image_file_content = $request->file('image');
            $imageName = time() . '.' . $image_file_content->getClientOriginalExtension();
            $image_file_content->storeAs('uploads/clients', $imageName, ['disk' => 'uploads']);
        }
        return $client->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $imageName ?? $client->image,
            'phone' => $request->phone,
        ]);
    }

    public function destroy($client) {
        Storage::disk('uploads')->delete('uploads/clients/' . $client->image);
        return $client->delete();
    }
}


