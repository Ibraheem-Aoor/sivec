<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = $this->getServicesToSeed();
        foreach ($services as $service) {
            Service::query()->create($service);
        }
    }

    private function getServicesToSeed(): array
    {
        return [
            // 1
            [
                'image' => 'services/eyJpdiI6Ik9HTUFQZWNYUSs2aHpLSHhxT2FGelE9abc.png',
                'icon' => 'fa fa-sitemap',
                'ar' => [
                    'name' => 'الإشراف الهندسي',
                    'details' => 'لدينا فريق متميز ومبدع ذو خبرة واسعة في التصميم المعماري والإنشائي. لمساعدة عملائنا في الحصول على أفضل الحلول المعمارية مع مراعاة الجودة والفن والذوق في الاختيار',
                ],
                'en' => [
                    'name' => 'Engineering Supervision',
                    'details' => 'We have a distinguished, creative team with extensive experience in architectural and structural design. To Assist our clients in obtaining the best architectural solutions, taking into account quality, art and taste in Choosing',
                ],
                'category_id' => 1,
            ],
            // 2
            [
                'image' => 'services/eyJpdiI6IlRhMzUreWV0MVpiQmJQeEJIY3lFWGc9abc.jpg',
                'icon' => 'fa fa-city',
                'ar' => [
                    'name' => 'التخطيط العمراني',
                    'details' => 'نتطلع دائمًا إلى تقديم كل ما هو جديد من حيث التصميمات المبتكرة والدقيقة على أيدي أمهر كفاءات المهندسين المعماريين وأحدث البرامج الهندسية لتحقيق أفضل استخدام ممكن للمساحات وإظهار جماليات التصميم ، وهو أمر حيوي يساعد عملائنا على فهم مشروعهم بشكل أفضل من مرحلة مبكرة حتى اكتماله. كما أننا قادرون على تنفيذ جميع الخطط بالإمكانيات المناسبة لكل عميل',
                ],
                'en' => [
                    'name' => 'Urban planning',
                    'details' => 'We always look forward to presenting all that is new in terms of innovative and accurate designs at the hands Of the most skilled competencies of architects and the latest engineering programs to make the best possible Use of spaces and show the aesthetics of design, which is a vital matter that helps our customers to better Understand their project from an early stage until its completion. We are also able to implement all plans With the appropriate capabilities for each client',
                ],
                'category_id' => 1,
            ],
            // 3
            [
                'image' => 'services/eyJpdiI6IkIyclRVWGx5WW1GZTJ3NnpZdGNhL2c9abc.jpg',
                'icon' => 'fa fa-list',
                'ar' => [
                    'name' => 'إدارة المشاريع',
                    'details' => 'فريقنا قادر على تسليم المشاريع في الوقت المحدد وفي فترات زمنية قصيرة من خلال الإجراءات والعمليات والتنسيق الممتاز مع المقاولين والوكالات الحكومية.',
                ],
                'en' => [
                    'name' => 'Project management',
                    'details' => 'Our team is able to deliver projects on time and in short timescales through procedures, processes and Excellent coordination with contractors and government agencies.',
                ],
                'category_id' => 1,

            ],
            // 4
            [
                'image' => 'services/eyJpdiI6IkNBczg0anJZQllTeHFicjdzbk51VXc9abc.jpg',
                'icon' => 'fa fa-certificate',
                'ar' => [
                    'name' => 'التراخيص والإعتمادات',
                    'details' => 'إن ثقة عملائنا هي أهم عنصر في نجاحنا ، لذلك يعمل هذا القسم بجد لإكمال الموافقات والتراخيص اللازمة بسرعة لبدء العمل في المشروع وتسليمه في الموعد المحدد.',
                ],
                'en' => [
                    'name' => 'Licensing & Accreditation',
                    'details' => 'The trust of our customers is the most important element in our success, so this section of ours works hard to quickly complete the approvals and licenses necessary to start work on the project and deliver it on the specified schedule.',
                ],
                'category_id' => 1,

            ],
            // 5
            [
                'image' => 'services/eyJpdiI6InJyTXltdlFMbHRaZGdhR2lLREJocGc9abc.png',
                'icon' => 'fa fa-briefcase',
                'ar' => [
                    'name' => 'المكتب الفني والمناقصات',
                    'details' => 'نقوم بدراسة المشروع وحساب جميع عناصره من أجل إجراء مراجعة شاملة للمشروع حسب جداول الكميات المرفقة بالمقاولين',
                ],
                'en' => [
                    'name' => 'Technical Office & Tenders',
                    'details' => 'We study the project and calculate all its elements in order to conduct a comprehensive review of the project according to the bills of quantities attached to the contractors',
                ],
                'category_id' => 1,

            ],
            // 6
            [
                'image' => 'services/eyJpdiI6InUxbzNUME92emMxU1VMa0N1UUJqUUE9abc.jpg',
                'icon' => 'fa fa-palette',
                'ar' => [
                    'name' => 'التصميم',
                    'details' => 'لدينا فريق متميز ومبدع ذو خبرة واسعة في التصميم المعماري والإنشائي. لمساعدة عملائنا في الحصول على أفضل الحلول المعمارية مع مراعاة الجودة والفن والذوق في الاختيار',
                ],
                'en' => [
                    'name' => 'Design',
                    'details' => 'We have a distinguished, creative team with extensive experience in architectural and structural design. To assist our clients in obtaining the best architectural solutions, taking into account quality, art and taste in choosing',
                ],
                'category_id' => 1,

            ],
        ];
    }
}
