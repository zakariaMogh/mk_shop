<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'wilaya',
        'address',
        'cashback_sum',
        'state',
        'province',
        'sub_total',
        'total',
        'shipping',
        'shipping_type',
        'shipping_location',
    ];

    protected $with = ['user'];



    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withTimestamps()->withPivot('qte');
    }

    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class)->withPivot('qte');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
