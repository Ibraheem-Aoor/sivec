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
                    'name' => 'فلل طابق واحد',
                    'slug' => 'الرؤية-المتكاملة-فلل-طابق-واحد',
                ],
                'en' => [
                    'name' => 'VILLA GROUND',
                    'slug' => 'sivec-VILLA-GROUND',
                ],
            ],
            // 2
            [
                'ar' => [
                    'name' => 'فلل طابقين أو اكثر',
                    'slug' => 'الرؤية-المتكاملة-فلل-طابقين-أو-اكثر',
                ],
                'en' => [
                    'name' => 'VILLA G+1 or more',
                    'slug' => 'sivec-VILLA-G+1-or-more',
                ],
            ],
            // 3
            [
                'ar' => [
                    'name' => 'ملاحق خارجية',
                    'slug' => 'الرؤية-المتكاملة-ملاحق-خارجية',
                ],
                'en' => [
                    'name' => 'SERVICE BLOCKS',
                    'slug' => 'sivec-SERVICE-BLOCKS'
                ],
            ],
            // 4
            [
                'ar' => [
                    'name' => 'بنايات',
                    'slug' => 'الرؤية-المتكاملة-بنايات',
                ],
                'en' => [
                    'name' => 'buildings',
                    'slug' => 'sivec-buildings',
                ],
            ],
            // 5
            [
                'ar' => [
                    'name' => 'أسوار',
                    'slug' => 'الرؤية-المتكاملة-أسوار',
                ],
                'en' => [
                    'name' => 'fences',
                    'slug' => 'sivec-fences',
                ],
            ],
            // 6
            [
                'ar' => [
                    'name' => 'مساجد',
                    'slug' => 'الرؤية-المتكاملة-مساجد',
                ],
                'en' => [
                    'name' => 'mosques',
                    'slug' => 'sivec-mosques',
                ],
                'parent_id' => 4,
            ],

            [
                'ar' => [
                    'name' => 'بنايات',
                    'slug' => 'الرؤية-المتكاملة-بنايات-فرعي',
                ],
                'en' => [
                    'name' => 'buildings',
                    'slug' => 'sivec-sub-buildings',
                ],
                'parent_id' => 4,
            ],
        ];
    }
}
