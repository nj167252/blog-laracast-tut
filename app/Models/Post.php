<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $with = ['category', 'author']; // this defaults to eager loading on every post request

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            $query
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });
    }

    protected $guarded = [];

    public function category()
    {
        //hasOne, hasMany, belongsTo belongsToMany
        
        return $this->belongsTo(Category::class);
    }

    public function author()
    {        
        return $this->belongsTo(User::class, 'user_id');
    }

    // Laravel uses id to find individual posts
    // This will allow you to bypass that in favor of a unique slug
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
