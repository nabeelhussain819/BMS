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
        $books = Book::with('author')->where('created_By', $id)->get();

        return view('pages.books.index', compact('books'));
    }


    public function create()
    {
        //

        return view(
            'pages.books.create',
            [
                'authors' => Author::all(),
                'categories' => Category::all(),
                'language' => Language::all(),
                'genres' => Genre::all()
            ]
        );
    }


    public function store(Request $request)
    {
        $book = books::create(){
            [
                'authors' => Author::all(),
                'categories' => Category::all(),
                'language' => Language::all(),
                'genres' => Genre::all()
            ]
        };
        
        try {
           
            $book = new Book;
            $book->authors = $require->author_name;
            $book->categories = $require->category_name;
            $book->language  = $require->language_name;
            $book->generes = $require->generes_name;
            
            $book->save();

            if($request->file('file')){
                $imageName= time.".".$image->extension();
                $img = image::make($image->getRealPath());
                $img->stream();
                Storage::disk('local')->put('images/'. $imageName, $img,'public');
                $admin_qoute->media_id = $imageName;
            }

            $ISBN = $request->input('ISBN', rand(0, 10));


            $books->title = $request->title;
            $books->price = $request->price;
            $books->year = $request->year;
            $books->description = $request->desc;
            $books->active = $request->active;
            $books->created_By = Auth::user()->id;
            $books->updated_By = Auth::user()->id;
            $books->ISBN = $ISBN;

            $books->save();


            
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
