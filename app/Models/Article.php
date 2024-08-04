<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'heading',
        'subheading',
        'category',
        'body',
        'pub_date',
        'img_src',
        'references',
    ];
}
