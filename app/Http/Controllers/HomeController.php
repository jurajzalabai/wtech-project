<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
            $latest =  Book::where('active', true)->orderBy('created_at')->take(6)->get();
            $best_selling =  Book::orderBy('sold_count', "desc")->take(6)->get();
            $book_count =  Book::count();
            $book_active_count =  Book::where('active', true)->count();
            return view('home.home', ['latest'=>$latest, 'best_selling'=>$best_selling, 'book_count'=>$book_count, 'book_active_count'=>$book_active_count]);
    }
}
