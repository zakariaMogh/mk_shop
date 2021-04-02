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
        $quantity = 0;
        foreach ($this->sizes as $size){
            $quantity += $size->size_quantity;
        }
        return $quantity > 0 ? 'active' : 'inactive';
    }

    public function getImageUrlAttribute(): string
    {
        return isset($this->images[0]) ?
            '/storage/'.$this->images[0]->image :
            'admin-assets/images/category/icon-1.svg';
    }

    protected $appends = ['image_url'];


    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }


    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function sizes(): HasMany
    {
        return $this->hasMany(Size::class);
    }


    public function reviews(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'reviews')->using(Review::class)->withPivot(['rate', 'comment'])->withTimestamps();
    }

//    public function comments(): BelongsToMany
//    {
//        return $this->belongsToMany(User::class, 'comments')->using(Comment::class)->withPivot(['content'])->withTimestamps();
//    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class)->withTimestamps()->withPivot('qte');
    }
}
