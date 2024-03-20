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
    //    protected $guarded = [];

    protected $fillable = ['title', 'excerpt', 'body']; // only accept the following properties
}
