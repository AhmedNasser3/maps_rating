<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use App\Models\Category; // تأكد من استيراد الـ Category Model
use App\Models\Place;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // إضافة الفئات
        $category1 = Category::create(['title' => 'أسواق', 'slug' => 'souks']);
        $category2 = Category::create(['title' => 'مطاعم', 'slug' => 'restaurants']);
        $category3 = Category::create(['title' => 'صيدليات', 'slug' => 'pharmacies']);

        // حذف جميع الأماكن السابقة لتجنب التكرار
        \DB::table('places')->truncate();

        // إضافة الأماكن وربطها بالفئات
        $place = new Place();
        $place->name = "سوق مكة";
        $place->slug = 'سوق-مكة';
        $place->image = "1.jpeg";
        $place->category_id = $category1->id;  // ربط الفئة بـ Place
        $place->overview = "هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث";
        $place->address = "الطريق الدائري الثالث، حي الهجرة، مكة ، المملكة العربية السعودية";
        $place->user_id = 1;
        $place->latitude = 21.3924513;
        $place->longitude = 39.8226124;
        $place->view_count = 3;
        $place->save();

        $place = new Place();
        $place->name = 'مطعم مكة';
        $place->slug = 'مطعم-مكة';
        $place->image = '2.jpg';
        $place->category_id = $category2->id;  // ربط الفئة بـ Place
        $place->overview = "هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث...";
        $place->address = 'الكعكية، مكة ، المملكة العربية السعودية';
        $place->user_id = 2;
        $place->latitude = '35.743330';
        $place->longitude = '-5.819870';
        $place->view_count = 2;
        $place->save();

        $place = new Place();
        $place->name = 'صيدلية مكة';
        $place->slug = 'صيدلية-مكة';
        $place->image = 'default.png';
        $place->category_id = $category3->id;  // ربط الفئة بـ Place
        $place->overview = "هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث...";
        $place->address = 'شارع ذات النطاقين، الهجرة، مكة ، المملكة العربية السعودية';
        $place->user_id = 1;
        $place->latitude = '21.357680';
        $place->longitude = '39.860840';
        $place->view_count = 1;
        $place->save();

        $place = new Place();
        $place->name = 'صيدلية الشهد';
        $place->slug = 'صيدلية-الشهد';
        $place->image = '4.jpg';
        $place->category_id = $category3->id;  // ربط الفئة بـ Place
        $place->overview = "هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث...";
        $place->address = 'شارع خالد بن عبدالعزيز،، العزيزية الجنوبية، مكة ، المملكة العربية السعودية';
        $place->user_id = 3;
        $place->latitude = '21.431800';
        $place->longitude = '39.291380';
        $place->view_count = 0;
        $place->save();
    }
}