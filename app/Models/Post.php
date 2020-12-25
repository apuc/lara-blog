<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'sub_title', 'preview', 'content', 'views', 'likes', 'publish'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags()
    {
        return $this->hasMany(PostTags::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
