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

        $books = Book::take(100);

        if($request->get('slovak-language')){
            $books = $books->orWhere('language', 'like', 'Slovensky');
        }if($request->get('czech-language')){
            $books = $books->orWhere('language', 'like', 'Cesky');
        }if($request->get('english-language')){
            $books = $books->orWhere('language', 'like', 'Anglicky');
        }

//        $max_price = Book::max('price');

        $price_from = (int)$request->get('minimal_price');
        $price_to = (int)$request->get('maximum_price');

        if(!isset($books)){
            $books = Book::where('price', '>=', $price_from);
        }
        else{
            $books = $books->where('price', '>=', $price_from);
        }
        if(!empty($price_to)){
            $books = $books->where('price', '<=', $price_to);
        }

        $order_by = $request->input('order_by', 'price_asc');

        switch ($order_by){
            case 'price_asc':
                $books = $books->orderBy('price');
                break;
            case 'newest':
                $books = $books->orderBy('created_at');
                break;
            case 'top_selling':
//                TODO
                $books = $books->orderBy('price');
                break;
            default:
                $books = $books->orderBy('price');
        }

        $books = $books->paginate(10);


        return view('books.index', ['books'=>$books, 'order_by'=>$order_by, 'request'=>$request->all()]);
    }
}
