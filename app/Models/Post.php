<?php

namespace App\Models;

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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
