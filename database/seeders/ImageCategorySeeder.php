<?php

namespace Database\Seeders;

use App\Models\ImageCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image_categories = $this->getDataToSeed();
        foreach ($image_categories as $image_category) {
            ImageCategory::query()->create($image_category);
        }
    }

    private function getDataToSeed(): array
    {
        return [
            // 1
            [
                'ar' => [
                    'name' => 'فلل طابق واحد'
                ],
                'en' => [
                    'name' => 'VILLA GROUND'
                ],
            ],
            // 2
            [
                'ar' => [
                    'name' => 'فلل طابقين أو اكثر'
                ],
                'en' => [
                    'name' => 'VILLA G+1 or more'
                ],
            ],
            // 3
            [
                'ar' => [
                    'name' => 'ملاحق خارجية'
                ],
                'en' => [
                    'name' => 'SERVICE BLOCKS'
                ],
            ],
            // 4
            [
                'ar' => [
                    'name' => 'بنايات'
                ],
                'en' => [
                    'name' => 'buildings'
                ],
            ],
            // 5
            [
                'ar' => [
                    'name' => 'أسوار'
                ],
                'en' => [
                    'name' => 'fences'
                ],
            ],
            // 6
            [
                'ar' => [
                    'name' => 'مساجد'
                ],
                'en' => [
                    'name' => 'mosques'
                ],
                'parent_id' => 4,
            ],
            // 7
            [
                'ar' => [
                    'name' => 'بنايات'
                ],
                'en' => [
                    'name' => 'buildings'
                ],
                'parent_id' => 4,
            ],
        ];
    }
}
