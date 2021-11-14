<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function show(Book $book){
        $reviews =  Review::where('book_id', $book->id)->take(4)->get();
        return view('books.show', ['reviews'=>$reviews, 'book'=>$book]);
    }

    public function index(Request $request){


        $books = Book::All();
        return view('books.index', compact('books', $books));
    }
}
