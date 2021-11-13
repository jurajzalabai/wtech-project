<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function show(Book $book){
        return view('books.show', compact('book',$book));
    }

    public function index(){
        $books = Book::All();
        return view('books.index', compact('books', $books));
    }
}
