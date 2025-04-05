<?php

namespace Database\Seeders;

use App\Models\BusinessSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = $this->getDataToSeed();
        foreach ($settings as $setting) {
            BusinessSetting::query()->updateOrCreate(
                [
                    'key' => $setting['key'],
                    'lang' => $setting['lang'],
                ],
                $setting
            );
        }
    }

    private function getDataToSeed(): array
    {
        return [
            [
                'key' => 'whatsaap_number',
                'value' => '0509717598',
                'page' => 'site',
                'lang' => 'en',
            ],
            [
                'key' => 'whatsaap_number',
                'value' => '0509717598',
                'page' => 'site',
                'lang' => 'ar',
            ]
        ];
    }
}
