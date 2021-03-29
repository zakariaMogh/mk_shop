<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;


    protected $fillable = [
        'image',
        'title',
        'link'
    ];

    protected $appends = ['image_url'];


    public function getImageUrlAttribute()
    {
        return isset($this->image) ? asset('/storage/'.$this->image) : asset('admin-assets/images/category/icon-1.svg');
    }


}
