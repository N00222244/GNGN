<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;



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
        'author_id'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
