<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Books;

class Category extends Model
{
    //

    protected $table = "categories";

    public function categories()
    {

        return $this->belongsTo(Books::class, 'id');
    }
}
