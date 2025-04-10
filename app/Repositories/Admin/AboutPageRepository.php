<?php

namespace App\Repositories\Admin;

use App\Models\BusinessSetting;
use Illuminate\Support\Facades\Storage;

class AboutPageRepository
{
    public function getSettings($page, $lang, $columns)
    {
        return BusinessSetting::query()
            ->wherePage($page)
            ->whereLang($lang)
            ->pluck(...$columns);
    }

    public function updateSettings($request)
    {

        if ($request->file('about_image_1')) {
            $about_image_1_content = $request->file('about_image_1');
            $old_image_1 = BusinessSetting::query()->where('page', 'about')->where('key', 'about_image_1')->first();
            if ($old_image_1) {
                $old_image_1 = $old_image_1->value;
                Storage::disk('uploads')->delete('uploads/about/' . $old_image_1);
            }
            $avatar_file_content = $about_image_1_content;
            $imageName = time() . rand(1, 100000) . '.' . $avatar_file_content->getClientOriginalExtension();
            $avatar_file_content->storeAs('uploads/about', $imageName, ['disk' => 'uploads']);

            $this->saveRow('about', 'about_image_1', 'ar', $imageName);
            $this->saveRow('about', 'about_image_1', 'en', $imageName);
        }
        if ($request->file('about_image_2')) {
            $about_image_2_content = $request->file('about_image_2');
            $old_image_2 = BusinessSetting::query()->where('page', 'about')->where('key', 'about_image_2')->first();
            if ($old_image_2) {
                $old_image_2 = $old_image_2->value;
                Storage::disk('uploads')->delete('uploads/about/' . $old_image_2);
            }
            $avatar_file_content2 = $about_image_2_content;
            $imageName2 = time() . rand(1, 100000) . '.' . $avatar_file_content2->getClientOriginalExtension();
            $avatar_file_content2->storeAs('uploads/about', $imageName2, ['disk' => 'uploads']);

            $this->saveRow('about', 'about_image_2', 'ar', $imageName2);
            $this->saveRow('about', 'about_image_2', 'en', $imageName2);
        }
        $this->saveRow('about', 'about_us_text', 'ar', $request->settings_ar['about_us_text']);
        $this->saveRow('about', 'about_us_text', 'en', $request->settings_en['about_us_text']);
        $this->saveRow('about', 'exclusive_design_description', 'ar', $request->settings_ar['exclusive_design_description']);
        $this->saveRow('about', 'exclusive_design_description', 'en', $request->settings_en['exclusive_design_description']);
        $this->saveRow('about', 'pro_team_description', 'ar', $request->settings_ar['pro_team_description']);
        $this->saveRow('about', 'pro_team_description', 'en', $request->settings_en['pro_team_description']);
        $this->saveRow('about', 'about_us_features', 'ar', json_encode($request->settings_ar['about_us_features']));
        $this->saveRow('about', 'about_us_features', 'en', json_encode($request->settings_en['about_us_features']));
        return true;
    }

    public function updateBranchesPage($request)
    {
        $this->saveRow('branches', 'address_titles', 'ar', json_encode($request->ar['address_titles']));
        $this->saveRow('branches', 'address_titles', 'en', json_encode($request->en['address_titles']));
        $this->saveRow('branches', 'address_values', 'ar', json_encode($request->address_values));
        $this->saveRow('branches', 'address_values', 'en', json_encode($request->address_values));
        return true;
    }

    public function updateGeneralSettings($request)
    {
        $data = $request->toArray();
        foreach ($data as $key => $value) {
            $this->saveRow('site', $key, 'ar', $value);
            $this->saveRow('site', $key, 'en', $value);
        }
        return true;
    }

    public function saveRow($page, $key, $lang, $value)
    {
        return BusinessSetting::updateOrCreate([
            'page' => $page,
            'key' => $key,
            'lang' => $lang,
        ], [
            'value' => $value
        ]);
    }
}
