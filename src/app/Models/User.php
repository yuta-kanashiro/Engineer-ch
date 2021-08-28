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

    # いいねに関する処理
    // あるユーザーがいいねしている掲示板のIDを取得
    public function likes()
    {
        return $this->belongsToMany(Bulletin::class, 'likes', 'user_id', 'bulletin_id')->withTimestamps();
    }

    // いいね判定
    public function isLike($likeBulletinId)
    {
        //  いいね対象の掲示板ID（$likeBulletinId）が、すでにいいねしているbulletin_idと重複していないかどうかを判定
        return $this->likes()->where('bulletin_id', $likeBulletinId)->exists();
    }

    // いいね処理
    public function like($likeBulletinId)
    {
        $this->likes()->attach($likeBulletinId);
    }

    // いいねを外す処理
    public function unlike($likeBulletinId)
    {
        $this->likes()->detach($likeBulletinId);
    }

    # フォローに関する処理
    // あるユーザーがフォローしているユーザーのIDを取得
    public function followings()
    {
        return $this->belongsToMany(User::class, 'follow_users', 'following_id', 'follower_id')->withTimestamps();
    }

    // あるユーザーをフォローしているユーザーのIDを取得
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follow_users', 'follower_id', 'following_id')->withTimestamps();
    }

    // フォロー判定
    public function isFollowing($followUserId)
    {
        // フォロー対象のユーザID（$followUserId）が、すでにフォローしているfollower_idと重複していないかどうかを判定
        return $this->followings()->where('follower_id', $followUserId)->exists();
    }

    // フォロー処理
    public function follow($followUserId)
    {
        $this->followings()->attach($followUserId);
    }

    // アンフォロー処理
    public function unfollow($followUserId)
    {
        $this->followings()->detach($followUserId);
    }

    // フォロー数カウント
    public function countFollowings()
    {
        return $this->followings()->count();
    }

    // フォロワー数カウント
    public function countFollowers()
    {
        return $this->followers()->count();
    }
}
