<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'slug', 
        'title', 
        'description',
        'h1_title',
        'content',
        'preview_img',
        'status',
        'referrer_url'
    ];

    protected $hidden = [];
}