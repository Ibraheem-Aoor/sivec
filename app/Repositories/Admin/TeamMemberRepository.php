<?php

namespace App\Repositories\Admin;

use App\Models\ServiceCategory;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TeamMemberRepository
{
    public function getTeamMembers()
    {
        return TeamMember::query()->orderByDesc('created_at');
    }
    public function getTeamMember($id)
    {
        return TeamMember::find($id);
    }
    public function store($request)
    {
        $avatar_file_content = $request->avatar;
        $imageName = time() . '.' . $avatar_file_content->getClientOriginalExtension();
        $avatar_file_content->storeAs('uploads/team_members', $imageName, ['disk' => 'uploads']);

        return TeamMember::query()->create([
            'ar' => [
                'name' => $request->name_ar,
                'title_position' => $request->title_position_ar,
            ],
            'en' => [
                'name' => $request->name_en,
                'title_position' => $request->title_position_en,
            ],
            'status' => $request->status,
            'email' => $request->email,
            'phone' => $request->phone,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'linked_in' => $request->linked_in,
            'avatar' => $imageName,
        ]);
    }

    public function update($member, $request)
    {
        if ($request->file('avatar')) {
            Storage::disk('uploads')->delete('uploads/team_members/' . $member->avatar);
            $avatar_file_content = $request->file('avatar');
            $imageName = time() . '.' . $avatar_file_content->getClientOriginalExtension();
            $avatar_file_content->storeAs('uploads/team_members', $imageName, ['disk' => 'uploads']);
        }
        return $member->update([
            'ar' => [
                'name' => $request->name_ar,
                'title_position' => $request->title_position_ar,
            ],
            'en' => [
                'name' => $request->name_en,
                'title_position' => $request->title_position_en,
            ],
            'status' => $request->status,
            'email' => $request->email,
            'phone' => $request->phone,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'linked_in' => $request->linked_in,
            'avatar' => $imageName ?? $member->avatar,
        ]);
    }

    public function destroy($member)
    {
        Storage::disk('uploads')->delete('uploads/team_members/' . $member->avatar);
        return $member->delete();
    }
}
