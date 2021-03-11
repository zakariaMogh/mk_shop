<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'price',
        'cashback',
        'brand',
        'quality',
        'description',

    ];


    public function path(){
        return url('/product/'.$this->id.'-'.Str::slug($this->name));
    }

    public function getStateAttribute(): string
    {
        return $this->product_details_sum_quantity > 0 ? 'active' : 'inactive';
    }


    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }


    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function product_details(): HasMany
    {
        return $this->hasMany(ProductDetail::class);
    }


    public function reviews(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'reviews')->using(Review::class)->withPivot(['rate'])->withTimestamps();
    }
}
