<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $places = Place::orderBy('view_count','desc')->take(3)->get();
        $AllPlaces = Place::orderBy('id','desc')->get();
        return view('welcome', compact('places','AllPlaces'));
    }
}