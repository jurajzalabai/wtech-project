<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Database\Eloquent\Model;

class BookController extends Controller
{
    public function show(Book $book){
        $reviews =  Review::where('book_id', $book->id)->get();
        return view('books.show', ['reviews'=>$reviews, 'book'=>$book]);
    }

    public function index(Request $request){
        $order_by = $request->input('order_by', 'price_asc');
        $price_from = $request->input('price_from', 0);
        $price_to = $request->input('price_to',null);

        $books = Book::where('price','>',$price_from);

        switch ($order_by){
            case 'price_asc':
                $books = $books->orderBy('price');
                break;
            case 'newest':
                $books = $books->orderBy('created_at')->paginate(10);
                break;
            case 'top_selling':
//                TODO
                $books = $books->orderBy('price')->paginate(10);
                break;
            default:
                $books = $books->orderBy('price')->paginate(10);
        }

        $books = $books->paginate(10);


        return view('books.index', ['books'=>$books, 'order_by'=>$order_by]);
    }
}
