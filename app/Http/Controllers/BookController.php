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

        $books = Book::where('active', true);

        $category = Category::find(request()->category);

        if(request()->category){
            if(!$category)
                abort(404);

            if($category->parent_id==null){
                $books = $books->with('category')->whereHas('category', function($query){
                    $query->where('parent_id', request()->category);
                });
            }
            else{
                $books = $books->with('category')->whereHas('category', function($query){
                    $query->where('id', request()->category);
                });
            }

            $categoryName = $category->name;
        }
        else{
            $books = $books->with('category');
            $categoryName = 'Všetky knihy';
        }

//      full-text-search
        if($request->search){
            $search_text = $request->search;
            $books = $books->where(function($q) use ($search_text) {
                $q->whereHas('author', function ($query) use ($search_text) {
                        $query->where('name', 'ilike', '%' . $search_text . '%');
                    })->orWhere('title', 'ilike', '%' . $search_text . '%');
            });
            $categoryName = "Hľadať: ".$search_text;
        }

        $books = $this->filterLanguage($books, $request);
        $books = $this->filterBindingType($books, $request);


        $price_from = (int)$request->minimal_price;
        $price_to = (int)$request->maximum_price;

        if(!empty($price_from)){
            $books = $books->where('price', '>=', $price_from);
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
            'category'=>$category,
            'category_name' => $categoryName,
            'main_categories' => Category::whereNull('parent_id')->get(),
        ]);
    }


    public function filterLanguage($books, $request){
        $languages = [];

        if($request->get('slovak-language')){
            $languages[] = 'Slovensky';
        }if($request->get('czech-language')){
            $languages[] = 'Cesky';
        }if($request->get('english-language')){
            $languages[] = 'Anglicky';
        }

        if($languages) {
            $books = $books->whereIn('language', $languages);
        }
        return $books;
    }

    public function filterBindingType($books, $request){
        $bindingTypes = [];

        if($request->get('hard-cover')){
            $bindingTypes[] = 'Pevna vazba';
        }if($request->get('soft-cover')){
            $bindingTypes[] = 'Makka vazba';
        }

        if($bindingTypes) {
            $books = $books->whereIn('binding_type', $bindingTypes);
        }
        return $books;
    }
}
