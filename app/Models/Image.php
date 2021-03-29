<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'product_id'
    ];
    protected $appends = ['image_url'];

    public function getImageUrlAttribute(): string
    {
        return isset($this->image) ?
            asset('/storage/'.$this->image) :
            asset('admin-assets/images/category/icon-1.svg');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
