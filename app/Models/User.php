<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use http\Exception;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'pic',
        'email',
        'password',
        'phone_1'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Send a password reset notification to the user.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $code = rand(10000,99999);
        PasswordResetCode::create([
            'email' => $this->email,
            'code' => $code,
            'created_at' => now()
        ]);

        $this->notify(new ResetPasswordNotification($code));

    }


    protected $appends = ['pic_url'];

    public function getPicUrlAttribute()
    {
        return isset($this->pic) ? 'storage/'.$this->pic : 'admin-assets/images/avatar/img-5.jpg';
    }

    public function getNameAttribute()
    {
        return $this->username;
    }


    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function reviews(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'reviews')->using(Review::class)->withPivot(['rate', 'comment'])->withTimestamps();
    }


    public function linkedSocialAccounts()
    {
        return $this->hasMany(LinkedSocialAccount::class);
    }
}
