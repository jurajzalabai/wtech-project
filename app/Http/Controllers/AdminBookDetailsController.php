<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminBookDetailsController extends Controller
{
    public function show($id){
        $book = Book::find($id);
        if (!$book){
            abort(404);
        }
        $reviews =  Review::where('book_id', $book->id)->get();
        return view('admin.admin-book-details', ['reviews'=>$reviews, 'book'=>$book]);
    }

    public function destroy($id)
    {
        $book_2 = Book::find($id);
        $book_2->delete();
        return redirect()->route('home');
    }

    public function create(Request $request){

//        dd($request->all());
        $rules = array(
            'title' => 'required',
            'publisher' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'number_of_pages' => 'required|integer',
            'rating' => 'required'|'integer',
            'publish_date' => 'required|date',
            'reading_time' => 'required|integer',
            'binding_type' => 'required',
            'language' => 'required',
            'stock_level' => 'required|integer',
            'image' => 'required|image',
            'author' => 'required',
            'category' => 'required|integer',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            $request->session()->flash('message', 'Nevyplnili ste všetky potrebné údaje');
            return redirect()->back();
        }

        $path = $request->file('image')->store('uploads', 'public');
        //dd($request->file('image')->store('img', 'public'));

        $author = Author::where("name", $request->input('author'))->get()->first();
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
            'category_id' => $request->input('category'),
            ]
        );
        $book->save();
        $request->session()->flash('message', 'Kniha úspešne vytvorená');
        return redirect()->route('home');
    }

    public function new()
    {
        return view('admin.admin-book-details-new');
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


    // path pri dvoch postoch.. netusim ako ..
    // cas citania ?
    // validacia na vsetko
    // vymazanie reviews
    // farba popisu

    //TODO SIDE
    //TODO description  - stranka od ada
    //TODO description textarea cele zle - input
    //TODO ten isty nazov pre knihu
    // TODO selektor - automaticka hodnota ///// add proste automaticky


    public function change(Request $request)
    {
//        return $request->all();

        $rules = array(
            'title' => 'required',
            'publisher' => 'required',
            'description' => 'required',
            'price' => 'required',
            'number_of_pages' => 'required',
            'rating' => 'required',
            'publish_date' => 'required',
            'reading_time' => 'required',
            'binding_type' => 'required',
            'language' => 'required',
            'photo_path' => 'required',
            'author' => 'required',
            'category' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            $request->session()->flash('message', 'Nevyplnili ste všetky potrebné údaje');
            return redirect()->back();
        }

        if ($request->input('id')){
            $book = Book::find($request->input('id'));
        }
        else{
            abort(404);
        }
        $author = Author::where("name", $request->input('author'))->get()->first();
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
        $book['rating'] = $request->input('rating');
        $book['price'] = $request->input('price');
        $book['description'] = $request->input('description');
        $book['publish_date'] = $request->input('publish_date');
        $book['binding_type'] = $request->input('binding_type');
        $book['number_of_pages'] = $request->input('number_of_pages');
        $book['reading_time'] = $request->input('reading_time');
        $book['publisher'] = $request->input('publisher');
        $book['language'] = $request->input('language');
        $book['category_id'] = $request->input('category');
        $book->save();
        $request->session()->flash('message', 'Kniha bola zmenená');
        return redirect()->back();
    }
}
