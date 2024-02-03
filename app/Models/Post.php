<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%');
        }

        if ($filters['category'] ?? false) {
            $query->whereHas('category',
                fn($query) => $query->where('slug', request('category')));
        }

        if ($filters['author'] ?? false) {
            $query->whereHas('author',
                fn($query) => $query->where('username', request('author')));
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
