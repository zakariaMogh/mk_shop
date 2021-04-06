<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'color',
        'quantity'
    ];


    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class)->withTrashed();
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class)->withPivot('qte');
    }
}
