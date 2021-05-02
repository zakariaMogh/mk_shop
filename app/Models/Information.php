<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'phone',
        'logo',
        'province',
        'wilaya',
        'address'
    ];


    public function getLogoUrlAttribute()
    {
        return (asset('storage/'.$this->logo) ?? asset('logo/mk_shop.png'));
    }
}
