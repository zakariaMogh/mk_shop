<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'name',
        'price',
        'cashback',
        'brand',
        'quality',
        'description',
    ];




    public function path(){
        return url('/product/'.$this->id.'/'.Str::slug($this->name));
    }

    public function getStateAttribute(): string
    {
        $quantity = 0;
        foreach ($this->sizes as $size){
            foreach ($size->colors as $color)
            $quantity += $color->quantity;
        }

        return $quantity > 0 ? 'active' : 'inactive';
    }

    public function getImageUrlAttribute(): string
    {
        $image = isset($this->images[0]) ? '/storage/'.$this->images[0]->image : 'admin-assets/images/product/png.png';
        $this->makeHiddenIf(!\request()->is('api/products*'),'images');
        return $image;
    }

    public function getCurrentPriceAttribute(): string
    {
       return ($this->cashback > 0 ? $this->cashback : $this->price);
    }

    public function getNoteAttribute()
    {
        $note = 0;
        foreach ($this->reviews as $review){
            $note += $review->pivot->rate;
        }

        $this->makeHiddenIf(!\request()->is('api/products*'),'reviews');

        return $note/($this->reviews->count() > 0 ? $this->reviews->count() : 1);
    }


    protected $appends = ['image_url', 'note'];

    public function getCategoryAttribute()
    {
        return $this->categories->whereNull('parent_id');
    }

    public function getSubCategoryAttribute()
    {
        return $this->categories->whereNotNull('parent_id');
    }

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
        return $this->belongsToMany(User::class, 'reviews')->using(Review::class)->withPivot(['rate', 'comment', 'id'])->withTimestamps();
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
