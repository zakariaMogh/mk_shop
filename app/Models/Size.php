<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Size extends Model
{
    use HasFactory;


    protected $fillable = [
        'size',
    ];

    protected $with = [
        'colors'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function colors(): HasMany
    {
        return $this->hasMany(Color::class);
    }
}
