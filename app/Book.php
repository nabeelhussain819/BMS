<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Author;
use App\Language;
use App\Category;
use App\Genre;

class Book extends Model
{
    //
    protected $table = 'books';

    protected $fillable = [
        'title', 'price', 'year', 'ISBN', 'author_id',
    ];


    public function author()
    {

        return $this->hasOne(Author::class, 'id', 'author_id');
    }

    public function categories()
    {

        return $this->hasOne(Category::class, 'id', 'category');
    }

    public function genres()
    {
        return $this->hasOne(Genre::class, 'id', 'genre');
    }

    public function languages()
    {
        return $this->hasOne(Language::class, 'id', 'language');
    }

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'created_By');
    }
}
