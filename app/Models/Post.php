<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /*
     * everything is fillable except for the following properties
     * if empty means that we want mass assignment protection disabled
     */
    protected $guarded = [];

    //    protected $fillable = ['title', 'slug', 'excerpt', 'body']; // only accept the following properties

    protected $with = ['category', 'author']; // eager these relationships by default

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter(Builder $query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) => $query
            ->where('title', 'like', "%$search%")
            ->orWhere('body', 'like', "%$search%")
        );

        $query->when($filters['category'] ?? false, fn($query, $category) => $query
            ->whereHas('category', fn($query) => $query
                ->where('slug', $category))
        );
    }
}
