<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'bulletin_id',
        'comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bulletin()
    {
        return $this->belongsTo(Bulletin::class);
    }
}
