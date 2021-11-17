<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    public function show(Book $book){
        $reviews =  Review::where('book_id', $book->id)->get();
        return view('books.show', ['reviews'=>$reviews, 'book'=>$book]);
    }

    public function index(Request $request){

//      filter by category
        if(request()->category){
            $category = Category::find(request()->category);

            if(!$category)
                abort(404);

            if($category->parent_id==null){
                $books = Book::with('category')->whereHas('category', function($query){
                    $query->where('parent_id', request()->category);
                });
            }
            else{
                $books = Book::with('category')->whereHas('category', function($query){
                    $query->where('id', request()->category);
                });
            }

            $categoryName = $category->name;
        }
        else{
            $books = Book::with('category');
            $categoryName = 'Všetky knihy';
        }

//      full-text-search
        if($request->search){
            $search_text = $request->search;
            $books = $books->whereHas('author',
                function($query) use ($search_text) {
                    $query->where('name', 'ilike', '%'.$search_text.'%');
                })->orWhere('title', 'ilike', '%'.$search_text.'%');
            $categoryName = "Hľadať: ".$search_text;

        }

        if($request->get('slovak-language')){
            $books = $books->orWhere('language', 'like', 'Slovensky');
        }if($request->get('czech-language')){
            $books = $books->orWhere('language', 'like', 'Cesky');
        }if($request->get('english-language')){
            $books = $books->orWhere('language', 'like', 'Anglicky');
        }

        $price_from = (int)$request->minimal_price;
        $price_to = (int)$request->maximum_price;

        if(!empty($price_from)){
            $books = $books->where('price', '>=', $price_from);
//            return($books->get());
        }
        if(!empty($price_to)){
            $books = $books->where('price', '<=', $price_to);
        }

        $order_by = request()->input('order_by','price_asc');
        switch ($order_by){
            case 'newest':
                $books = $books->orderBy('created_at');
                break;
            case 'top_selling':
                $books = $books->orderBy('sold_count');
                break;
            default:
                $books = $books->orderBy('price');
                break;
        }

        $books = $books->paginate(10);



        return view('books.index', [
            'books'=>$books,
            'order_by'=>$order_by,
            'request'=>$request->all(),
            'category_name' => $categoryName,
            'main_categories' => Category::whereNull('parent_id')->get(),
        ]);
    }
}
