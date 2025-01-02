<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\RateableTrait;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AdminPlaceNotification;
use App\Notifications\UserApprovalNotification;

class PlaceController extends Controller
{
    use RateableTrait;

    public function show(Place $place)
    {
        $place = Place::withCount('reviews')->with(['reviews' => function ($query) {
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
        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(storage_path('app/public/images'), $imageName);
            $data['image'] = $imageName;
        }

        // إنشاء المكان وربطه بالمستخدم
        $place = $request->user()->places()->create($data);

        // إرسال إشعار إلى الأدمن
        $adminUsers = User::where('role_id', 2)->get();
        Notification::send($adminUsers, new AdminPlaceNotification($place));

        // إرسال إشعار للمستخدم
        $request->user()->notify(new UserApprovalNotification($place));

        return back()->with('success', 'تم إرسال طلب إنشاء المكان، بانتظار موافقة الإدارة.');
    }

    public function approve(Request $request, $id)
    {
        $place = Place::findOrFail($id);

        // تحديث حالة الموافقة
        $place->update(['is_approved' => true]);

        // إرسال إشعار إلى المستخدم
        $place->user->notify(new UserApprovalNotification($place));

        return back()->with('success', 'تمت الموافقة على المكان بنجاح.');
    }

    public function indexPending()
    {
        $places = Place::where('is_approved', false)->get();
        return view('admin.pending_places', compact('places'));
    }
}
