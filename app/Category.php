<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;

class Category extends Model
{
    //

    protected $table = "categories";

    public function categories()
    {

        return $this->belongsTo(Book::class, 'id');
    }
}
