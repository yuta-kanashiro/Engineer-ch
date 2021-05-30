<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    protected $fillable = [
        'user_id', 'title', 'limited_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
