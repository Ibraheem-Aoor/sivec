<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service_categories = $this->getDataToSeed();
        foreach ($service_categories as $service_category) {
            ServiceCategory::query()->create($service_category);
        }
    }

    private function getDataToSeed(): array
    {
        return [
            // 1
            [
                'ar' => [
                    'name' => 'خدمات',
                ],
                'en' => [
                    'name' => 'Services',
                ],
            ],
        ];
    }
}
