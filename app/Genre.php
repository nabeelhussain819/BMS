<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;

class Genre extends Model
{
    //
    protected $table = 'genres';


    public function books()
    {

        return $this->belongsTo(Book::class, 'id');
    }
}
