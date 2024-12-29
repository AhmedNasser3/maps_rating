<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('places')->truncate();

        $place = new \App\Models\Place();
        $place->name="سوق مكة";
        $place->slug = 'سوق-مكة';
        $place->image="1.jpeg";
        $place->category_id=3;
        $place->overview="هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم ت وليد هذا النص من مولد النص العربى، حيث";
        $place->address="الطريق الدائري الثالث، حي الهجرة، مكة ، المملكة العربية السعودية";
        $place->user_id=1;
        $place->latitude=21.3924513;
        $place->longitude=39.8226124;
        $place->view_count=3;
        $place->save();


        $place = new \App\Models\Place();
        $place->name = 'مطعم مكة';
        $place->slug = 'مطعم-مكة';
        $place->image = '2.jpg';
        $place->category_id = 2;
        $place->overview = "هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
        إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
        ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.
        هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.";
        $place->address = 'الكعكية، مكة ، المملكة العربية السعودية';
        $place->user_id = 2;
        $place->latitude = '35.743330';
        $place->longitude = '-5.819870';
        $place->view_count = 2;
        $place->save();

        $place = new \App\Models\Place();
        $place->name = 'صيدلية مكة';
        $place->slug = 'صيدلية-مكة';
        $place->image = 'default.png';
        $place->category_id = 6;
        $place->overview = "هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
        إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
        ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.
        هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.";
        $place->address = 'شارع ذات النطاقين، الهجرة، مكة ، المملكة العربية السعودية';
        $place->user_id = 1;
        $place->latitude = '21.357680';
        $place->longitude = '39.860840';
        $place->view_count = 1;
        $place->save();

        $place = new \App\Models\Place();
        $place->name = 'صيدلية الشهد';
        $place->slug = 'صيدلية-الشهد';
        $place->image = '4.jpg';
        $place->category_id = 6;
        $place->overview = "هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
        إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
        ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.
        هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.";
        $place->address = 'شارع خالد بن عبدالعزيز،، العزيزية الجنوبية، مكة ، المملكة العربية السعودية';
        $place->user_id = 3;
        $place->latitude = '21.431800';
        $place->longitude = '39.291380';
        $place->view_count = 0;
        $place->save();
    }
}