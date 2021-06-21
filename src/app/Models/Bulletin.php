<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'summary',
        'limited_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // コメント数カウント
    public function counts()
    {
        return $this->comments()->count();
    }

}
