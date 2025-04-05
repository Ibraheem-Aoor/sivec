<?php

namespace Database\Seeders;

use App\Models\ProjectCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project_categories = $this->getDataToSeed();
        foreach ($project_categories as $project_category) {
            ProjectCategory::query()->create($project_category);
        }
    }
    private function getDataToSeed(): array
    {
        return [
            // 1
            [
                'ar' => [
                    'name' => 'تصاميم داخلية',
                ],
                'en' => [
                    'name' => 'INTERIOR',
                ],
                'image' => 'gallery/int/classic/BEDROOM/1 (2).jpg',
            ],
            //2
            [
                'ar' => [
                    'name' => 'كلاسيك',
                ],
                'en' => [
                    'name' => 'CLASSIC',
                ],
                'image' => 'gallery/int/classic/BEDROOM/1 (2).jpg',
                'parent_id' => 1,
            ],
            // 3
            [
                'ar' => [
                    'name' => 'غرف نوم',
                ],
                'en' => [
                    'name' => 'BEDROOM',
                ],
                'image' => 'gallery/int/classic/BEDROOM/1 (2).jpg',
                'parent_id' => 2,
            ],
            // 4
            [
                'ar' => [
                    'name' => 'مطابخ',
                ],
                'en' => [
                    'name' => 'KIT',
                ],
                'image' => 'gallery/int/classic/BEDROOM/1 (2).jpg',
                'parent_id' => 2,
            ],
            // 5
            [
                'ar' => [
                    'name' => 'معيشة',
                ],
                'en' => [
                    'name' => 'LIVING',
                ],
                'image' => 'gallery/int/classic/BEDROOM/1 (2).jpg',
                'parent_id' => 2,
            ],
            // 6
            [
                'ar' => [
                    'name' => 'عصري',
                ],
                'en' => [
                    'name' => 'MODERN',
                ],
                'image' => 'gallery/int/classic/BEDROOM/1 (2).jpg',
                'parent_id' => 1,
            ],
            // 7
            [
                'ar' => [
                    'name' => 'غرف نوم',
                ],
                'en' => [
                    'name' => 'BEDROOM',
                ],
                'image' => 'gallery/int/classic/BEDROOM/1 (2).jpg',
                'parent_id' => 6,
            ],
            // 8
            [
                'ar' => [
                    'name' => 'جيمنج',
                ],
                'en' => [
                    'name' => 'GAMMING',
                ],
                'image' => 'gallery/int/classic/BEDROOM/1 (2).jpg',
                'parent_id' => 6,
            ],
            // 9
            [
                'ar' => [
                    'name' => 'مطابخ',
                ],
                'en' => [
                    'name' => 'KITCHEN',
                ],
                'image' => 'gallery/int/classic/BEDROOM/1 (2).jpg',
                'parent_id' => 6,
            ],
            // 10
            [
                'ar' => [
                    'name' => 'معيشة',
                ],
                'en' => [
                    'name' => 'LIVING',
                ],
                'image' => 'gallery/int/classic/BEDROOM/1 (2).jpg',
                'parent_id' => 6,
            ],
            // 11
            [
                'ar' => [
                    'name' => 'مجلس',
                ],
                'en' => [
                    'name' => 'MAJLIS',
                ],
                'image' => 'gallery/int/classic/BEDROOM/1 (2).jpg',
                'parent_id' => 6,
            ],
            // 12
            [
                'ar' => [
                    'name' => 'كلاسيك حديث',
                ],
                'en' => [
                    'name' => 'NEW CLASSIC',
                ],
                'parent_id' =>  1,
                'image' => 'gallery/int/classic/BEDROOM/1 (2).jpg',
            ],
            // 13
            [
                'ar' => [
                    'name' => 'غرف نوم',
                ],
                'en' => [
                    'name' => 'BEDROOM',
                ],
                'image' => 'gallery/int/classic/BEDROOM/1 (2).jpg',
                'parent_id' => 12,
            ],
            // 14
            [
                'ar' => [
                    'name' => 'غرف العشاء',
                ],
                'en' => [
                    'name' => 'DINING',
                ],
                'image' => 'gallery/int/classic/BEDROOM/1 (2).jpg',
                'parent_id' => 12,
            ],
            // 15
            [
                'ar' => [
                    'name' => 'خارجي',
                ],
                'en' => [
                    'name' => 'OUTDOOR',
                ],
                'parent_id' =>  1,
                'image' => 'gallery/int/classic/BEDROOM/1 (2).jpg',
            ],
        ];
    }
}
