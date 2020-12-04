<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        //i tried this but the result is not showing
        // $books = Books::with('authorName')->get();

        $books = Book::with('author')->get();
        //return $books;
        return view('pages.dashboard', compact('books'));
    }
}
