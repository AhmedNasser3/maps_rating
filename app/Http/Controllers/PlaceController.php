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
        if($request->image) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->storeAs('public\images', $imageName);
            $request->user()->places()->create($request->except('image') + ['image' => $imageName]);
        } else {
            $request->user()->places()->create($request->all());
        }

        return back();
    }
}
