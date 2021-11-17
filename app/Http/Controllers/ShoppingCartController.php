<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class ShoppingCartController extends Controller
{
    public function getCart(){
        $cart = session()->get('cart');
        if($cart == null){
            $cart = [];
        }
        return $cart;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cart = $this->getCart();
        return view('shoppingCart.index', ['cart'=>$cart]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = $this->getCart();

        $book_id = $request->input('id');
        $quantity = $request->input('quantity', 1);
        $book = Book::find($book_id);

        if(!$book){
            abort(404);
        }



        $price = $book->price * $quantity;

        if(isset($cart[$book_id])){
            $cart[$book_id]['quantity'] += $quantity;
            session()->put('cart', $cart);

            return redirect()->route('cart.index');
        }

        $cart[$book_id] = [
            "book_id" => $book_id,
            "title" => $book->title,
            "author" => $book->author->name,
            "photo_path" => $book->photo_path,
            "rating" => $book->rating,
            "quantity" => $quantity,
            "price" => $price
        ];

        session()->put('cart', $cart);


        return redirect()->route('cart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->quantity){
            $cart = $this->getCart();
            if(isset($cart[$id])){
                $cart[$id]['quantity'] = $request->quantity;
                session()->put('cart',$cart);
            }
        }
        return redirect()->back();
    }

    public function incrementQuantity(Request $request, $id)
    {
        $cart = $this->getCart();
        if(isset($cart[$id])){
            $cart[$id]['quantity'] += 1;
            session()->put('cart',$cart);
        }

        return redirect()->back();
    }

    public function decrementQuantity(Request $request, $id)
    {
        $cart = $this->getCart();
        if(isset($cart[$id])){
            if($cart[$id]['quantity']>1) {
                $cart[$id]['quantity'] -= 1;
                session()->put('cart', $cart);
            }
        }

        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = $this->getCart();
        if(isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back();

    }
}
