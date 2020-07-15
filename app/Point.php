<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable = ['language', 'awareness', 'healthy'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
