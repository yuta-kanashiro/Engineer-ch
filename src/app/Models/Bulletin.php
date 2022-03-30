<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'summary',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // ある掲示板をいいねしているユーザーのIDを取得
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes', 'bulletin_id', 'user_id')->withTimestamps();
    }

    // コメント数カウント
    public function countComments()
    {
        return $this->comments()->count();
    }

    // いいね数カウント
    public function countLikes()
    {
        return $this->likes()->count();
    }
}
