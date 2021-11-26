<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminBookDetailsController extends Controller
{
    public function edit(Request $request, $id){

        $book = Book::find($id);
        $reviews =  Review::where('book_id', $book->id)->get();
        $parent_categories =  Category::whereNull('parent_id')->get();
        return view('admin.admin-book-details', ['reviews'=>$reviews, 'book'=>$book, 'main_categories'=>$parent_categories]);
    }

    public function index(Request $request){

//      full-text-search
        if($request->search){
            $search_text = $request->search;
            $books = Book::where(function($q) use ($search_text) {
                $q->whereHas('author', function ($query) use ($search_text) {
                    $query->where('name', 'ilike', '%' . $search_text . '%');
                })->orWhere('title', 'ilike', '%' . $search_text . '%');
            });
            $categoryName = "Hľadať: ".$search_text;
        }

        if(!isset($books)){
//         $books = Book::with('author');
            $books = Book::with('author');
            $categoryName = "Všetky knihy";

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



        return view('admin.index', [
            'books'=>$books,
            'order_by' =>$order_by,
            'category_name' => $categoryName,
        ]);
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        $path = $book["photo_path"];
        $books = Book::where('photo_path', $path)->get();
        if (sizeof($books) == 1){
            $unlink = unlink($path);
            if (!$unlink){
                session()->flash('message', 'Problém s vymazávaním obrázku');
                return redirect()->back();
            }
        }
        $book->delete();
        return redirect()->route('admin.index');
    }

    public function create(Request $request){
        $parent_categories =  Category::whereNull('parent_id')->get();
        return view('admin.admin-book-details-new', ['main_categories'=>$parent_categories]);
    }

    public function store(Request $request){

//        dd($request->all());
        $request->validate([
            'title' => 'required',
            'publisher' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'number_of_pages' => 'required|integer',
            'rating' => 'required|integer|between:1,5',
            'publish_date' => 'required|date',
            'reading_time' => 'required|integer',
            'binding_type' => 'required',
            'language' => 'required',
            'stock_level' => 'required|integer',
            'image' => 'required|image',
            'author' => 'required',
            'category' => 'required',
        ]);
        $path = $request->file('image')->store('uploads', 'public');
        //dd($request->file('image')->store('img', 'public'));

        $author = Author::where("name", $request->input('author'))->get()->first();

        $category = Category::where("name",  $request->input('category'))->get()->first();
        $category_id = $category->id;

        if ($author){
            $id = $author["id"];
        }
        else{
            $author = new Author([
                'name' => $request->input('author'),
            ]);
            $author->save();
            $id = $author["id"];
        }


        $book = new Book([
                'title' => $request->input('title'),
                'publisher' => $request->input('publisher'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'number_of_pages' => $request->input('number_of_pages'),
                'rating' => $request->input('rating'),
                'sold_count' => 0,
                'publish_date' => $request->input('publish_date'),
                'reading_time' => $request->input('reading_time'),
                'binding_type' => $request->input('binding_type'),
                'language' => $request->input('language'),
                'stock_level' => $request->input('stock_level'),
                'photo_path' => "storage/" . $path,
                'active' => true,
                'author_id' => $id,
                'category_id' => $category_id,
            ]
        );
        $book->save();
        $request->session()->flash('message', 'Kniha úspešne vytvorená');
        return redirect()->route('admin.index');
    }

    public function picture(Request $request)
    {

        $rules = array(
            'image' => 'required|image',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            $request->session()->flash('message', 'Nesprávne ste vložili obrázok');
            return redirect()->back();
        }

        $book = Book::find($request->input('id'));
        $path = "storage/" . $request->file('image')->store('uploads', 'public');
        $book['photo_path'] = $path;
        $book->save();
        $request->session()->flash('message', 'Obrázok bol zmenený');
        return redirect()->back();
    }

    public function review(Request $request)
    {
        $review = new Review([
                "username" => $request->input('review_author'),
                "book_id" => $request->input('book_id'),
                "review_text" => $request->input('review_description'),
                "rating" => $request->input('review_rating')
        ]
        );
        $review->save();
        $request->session()->flash('message', 'Recenzia bola pridaná');
        return redirect()->back();
    }

    public function deleteReview($review_id){
        $review=Review::find($review_id);
        if(!$review){
            abort(404);
        }
        $review->delete();
        return redirect()->back();
    }


    // TODO validacia na vsetko

    //TODO SIDE
    //TODO description  - stranka od ada
    //TODO description textarea cele zle - input
    //TODO rozdelit javasript do osobitnych suborov
    //TODO v navigacii pridat tlacidlo pre male obrazovky




    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $request->validate([
            'title' => 'required',
            'publisher' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'number_of_pages' => 'required|integer',
            'rating' => 'required|integer|between:1,5',
            'publish_date' => 'required|date',
            'reading_time' => 'required|integer',
            'binding_type' => 'required',
            'language' => 'required',
            'author' => 'required',
            'category' => 'required',
        ]);

        $author = Author::where("name", $request->input('author'))->get()->first();

        $category = Category::where("name",  $request->input('category'))->get()->first();
        $category_id = $category->id;

        if ($author){
            $id = $author["id"];
        }
        else{
            $author = new Author([
                'name' => $request->input('author'),
            ]);
            $author->save();
            $id = $author["id"];
        }
        $book['title'] = $request->input('title');
        $book['author_id'] = $id;
        $book['rating'] = (int)$request->input('rating');
        $book['price'] = (float)$request->input('price');
        $book['description'] = $request->input('description');
        $book['publish_date'] = $request->input('publish_date');
        $book['binding_type'] = $request->input('binding_type');
        $book['number_of_pages'] = (int)$request->input('number_of_pages');
        $book['reading_time'] = (int)$request->input('reading_time');
        $book['publisher'] = $request->input('publisher');
        $book['language'] = $request->input('language');
        $book['category_id'] = $category_id;
        $book->save();
        $request->session()->flash('message', 'Kniha bola zmenená');
        return redirect()->route('admin.index');
    }
}
