<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Category;
use App\Genre;
use App\Language;
use App\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BooksController extends Controller
{


    public function index()
    {
        // calling books, which only user has inserted 

        $id = Auth::user()->id;
        $books = Book::where('created_By', $id)->get();

        return view('pages.books.index', compact('books'));
    }


    public function create()
    {
        //
        $authors = Author::all();
        $categories = Category::all();
        $language = Language::all();
        $genres = Genre::all();
        return view('pages.books.create', compact('authors', 'categories', 'genres', 'language'));
    }


    public function store(Request $request)
    {
        //Sir sorry for this messy code 

        try {
            //classes
            $books = new Book();
            $media = new Media();
            $author = new Author();
            $categories = new Category();
            $genres = new Genre();
            $language = new Language();

            //first storing books

            //storing authors

            if ($request->author_name1) {
                $author->name = $request->author_name1;
                $author->save();
            }

            if ($request->category_name) {
                $categories->name = $request->category_name;
                $categories->save();
            }

            if ($request->genre_name) {
                $genres->name = $request->genre_name;
                $genres->save();
            }
            if ($request->language_name) {
                $language->name = $request->language_name;
                $language->save();
            }

            if ($request->author_name1 == null) {
                $books->author_id = $request->author_name;
            } else {
                $books->author_id = $author->id;
            }

            if ($request->category_name == null) {
                $books->category = $request->category;
            } else {
                $books->category = $categories->id;
            }

            if ($request->genre_name == null) {
                $books->genre = $request->genre;
            } else {
                $books->genre = $genres->id;
            }

            if ($request->language_name == null) {
                $books->language = $request->language;
            } else {
                $books->language = $language->id;
            }

            $ISBN = $request->input('ISBN', rand(0, 10));


            $books->title = $request->title;
            $books->price = $request->price;
            $books->year = $request->year;
            $books->description = $request->desc;
            $books->active = true;
            $books->created_By = Auth::user()->id;
            $books->updated_By = Auth::user()->id;
            $books->ISBN = $ISBN;

            $books->save();


            //storing media with books sorry for bad code.

            $media->name = $books->title;
            $media->book_id = $books->id;
            $media->user_id = Auth::user()->id;
            $image = $request->file('file');
            $imageName = time() . "." . $image->extension();
            $image->move(public_path('images'), $imageName);

            $media->extension = $imageName;
            $media->system = "asd";
            $media->GUID = Str::uuid();
            //getting id using auth
            $media->created_By = Auth::user()->id;
            $media->updated_By = Auth::user()->id;


            $media->save();
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }


        return back()->with('success', 'A new Book has been added');
    }


    public function show($id)
    {
        //
        $books = Book::find($id);

        //calling id of user
        $id = Auth::user()->id;

        //calling image 
        $media = Media::where('created_By', $id)->first();

        return view('pages.books.show', compact('books', 'media'));
    }


    public function edit($id)
    {
        //
        $books = Book::find($id);
        //calling all authors
        $authors = Author::all();
        //calling id of user
        $id = Auth::user()->id;
        //calling image 
        $media = Media::where('created_By', $id)->first();

        return view('pages.books.edit', compact('books', 'authors', 'media'));
    }


    public function update(Request $request)
    {
        //
        try {
            //code...
            $books = Book::find($request->id);

            $ISBN = $request->input('ISBN', rand(0, 10));

            $books->title = $request->title;
            $books->price = $request->price;
            $books->year = $request->year;
            $books->author_name = $request->author_name;
            $books->created_By = Auth::user()->id;
            $books->updated_By = Auth::user()->id;
            $books->ISBN = $ISBN;

            $books->save();
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }

        return back()->with('success', 'Your Book has been updated');
    }


    public function destroy($id)
    {
        //
        try {
            //code...
            $books = Book::find($id);
            $media = Media::find(Auth::user()->id, 'created_By');
            $books->delete();
            // unlink(public_path('images/') . $media['extension']);
            $media->delete();
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }

        //deleting book
        return back()->with('success', 'book deleted');
    }
}
