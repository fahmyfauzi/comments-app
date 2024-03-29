<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relasi
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function totalComment()
    {
        return $this->hasMany(Comment::class);
    }
}
