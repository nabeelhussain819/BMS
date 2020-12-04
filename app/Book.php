<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Author;

class Book extends Model
{
    //
    protected $table = 'books';

    protected $fillable = [
        'title', 'price', 'year', 'ISBN', 'author_name', 'category', 'genre', 'language'
    ];


    public function author()
    {

        return $this->hasOne(Author::class, 'id');
    }

    public function category()
    {

        return $this->hasOne(Category::class, 'id');
    }
}
