<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when($filters['search'] ?? null, fn (Builder $query, $search) => $query
            ->where(fn ($query) => $query
                ->where('title', 'like', "%{$search}%")
                ->orWhere('body', 'like', "%{$search}%")
            )
        );

        $query->when($filters['category'] ?? false, fn (Builder $query, $category) => $query
            ->whereHas('category', fn ($query) => $query
                ->where('slug', $category))
        );

        $query->when($filters['author'] ?? false, fn (Builder $query, $author) => $query
            ->whereHas('author', fn ($query) => $query
                ->where('username', $author))
        );
    }
}
