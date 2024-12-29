<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewFormRequest;

class ReviewController extends Controller
{
    public function store(ReviewFormRequest $request)
    {
        if($request->user()->reviews()->wherePlace_id($request->place_id)->exists()) {
            return redirect(url()->previous() .'#review-div')->with('fail', 'لقد قيّمت هذا الموقع مسبقًا');
        }

        $review = Review::create($request->all() + ['user_id'=> auth()->id()]);
        return redirect(url()->previous() .'#review-div')->with('success', 'تم بنجاح إضافة مراجعة');
    }
}