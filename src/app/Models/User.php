<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'age', 'prefecture', 'password', 'profile_image', 'introduction',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function bulletins()
    {
        return $this->hasMany(Bulletin::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // あるユーザーがフォローしているユーザーを取得
    public function followings()
    {
        return $this->belongsToMany(User::class, 'follow_users', 'following_id', 'follower_id');
    }

    // あるユーザーをフォローしているユーザーを取得
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follow_users', 'follower_id', 'following_id');
    }
}
