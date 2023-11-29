<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'price', 'category_id', 'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->attributes['image']);
    }

}

