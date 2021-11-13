<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
            $latest =  Book::where('active', true)->orderBy('created_at')->take(6)->get();
            $best_selling =  Book::where('active', true)->orderByDesc('created_at')->take(6)->get();
            return view('home.home')->with('latest', $latest)->with('best_selling', $best_selling);

    }
}
