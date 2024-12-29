<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\RateableTrait;

class PlaceController extends Controller
{
    use RateableTrait;
    public function show(Place $place)
    {
        $place = $place::withCount('reviews')->with(['reviews' => function($query) {
            $query->with('user')
                  ->withCount('likes');
        }])->find($place->id);
        $avg = $this->averageRating($place);

        $total = $avg['total'];
        $service_rating = $avg['service_rating'];
        $quality_rating = $avg['quality_rating'];
        $cleanliness_rating = $avg['cleanliness_rating'];
        $pricing_rating = $avg['pricing_rating'];

        return view('details', compact('place', 'total', 'service_rating', 'quality_rating', 'cleanliness_rating', 'pricing_rating'));
    }
    public function create()
    {
        return view('add_place');
    }
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // تحديد اسم الصورة
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // حفظ الصورة يدويًا في المجلد المحدد
            $image->move(storage_path('app/public/images'), $imageName);

            // حفظ المكان في قاعدة البيانات
            $request->user()->places()->create(array_merge($request->except('image'), ['image' => $imageName]));
        } else {
            // إذا لم يتم رفع صورة
            $request->user()->places()->create($request->all());
        }



        return back();
    }
}