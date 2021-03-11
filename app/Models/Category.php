<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','slug','parent_id','image'
    ];

    public function deleteCategoryFile($categories): ?bool
    {
        foreach ($categories as $cat)
        {
            $cat->load('children');
            if ($cat->children->count() > 0){
                $cat->deleteCategoryFile($cat->children);
            }
            Storage::delete($cat->image);
        }
        return true;
    }


    public function scopeMainCategories($query): Builder
    {
        return $query->where('parent_id',null);
    }

    public function scopeSubCategories($query): Builder
    {
        return $query->where('parent_id','<>',null);
    }

    public function getImageUrlAttribute()
    {
        return isset($this->image) ? '/storage/'.$this->image : asset('admin-assets/images/category/icon-1.svg');
    }


    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class,'parent_id','id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class,'parent_id','id');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

}
