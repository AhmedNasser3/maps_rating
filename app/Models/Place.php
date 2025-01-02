<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{

    protected $guarded = ['id', 'view_count'];

    public function getImageAttribute($image) {

        return asset('storage/images/'.$image);

    }
    protected static function boot()
    {
        parent::boot();

        static::created(function ($place) {
            Event::dispatch('place.created', $place);
        });
    }
    public function scopeSearch($query, $request)
    {
        if($request->category) {
            $query->whereCategory_id($request->category);
        }

        if($request->address){
            $query->where('address', 'LIKE', '%'.$request->address.'%');
        }

        return $query;
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;

        // توليد slug من الاسم
        $slug = Str::slug($value);

        // التأكد من أن الـ slug فريد في الجدول
        $count = DB::table('places')->where('slug', $slug)->count();

        // إذا كان الـ slug موجودًا مسبقًا، أضف رقمًا لتمييزه
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        $this->attributes['slug'] = $slug;
    }

    public function bookmarks()
    {
        return $this->belongsToMany('App\Models\Bookmark', 'bookmarks');
    }
}
