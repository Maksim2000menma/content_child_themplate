<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = [
        'slug', 
        'title', 
        'description',
        'content',
        'preview_img',
        'status'
    ];
}