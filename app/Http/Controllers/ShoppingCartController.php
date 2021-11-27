<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;

class ShoppingCartController extends Controller
{
    public function getCart(){
        if(Auth::user()){
            $user = User::find(Auth::id());
            if(isset($user->cart)){
                $cart = unserialize($user->cart);
            }
            else {
                $cart = [];
            }
        }
        else {
            $cart = session()->get('cart');
            if ($cart == null) {
                $cart = [];
            }
        }

        return $cart;
    }

    public function storeCart($old_cart){
        if(Auth::user()){
            $user = User::find(Auth::id());
            $user->cart = serialize($old_cart);
            $user->save();
        }
        else {
            session()->put('cart', $old_cart);
        }

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
        $total_price = 0;
        foreach($cart as $item){
            $total_price+=$item['price'];
        }
        return view('shoppingCart.index', ['cart'=>$cart, 'total_price' => $total_price]);
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

        if ($book['stock_level'] < $request->quantity){
            $request->session()->flash('message', 'Nedostatočný počet kníh na sklade');
            return redirect()->route('cart.index');
        }

        $price = $book->price * $quantity;

        if(isset($cart[$book_id])){
            $cart[$book_id]['quantity'] += $quantity;
            $cart[$book_id]['price'] = $cart[$book_id]['quantity'] * $book->price;
            $this->storeCart($cart);

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

        $this->storeCart($cart);


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
                $book = Book::find($id);
                if ($book['stock_level'] < $request->quantity){
                    $request->session()->flash('message', 'Nedostatočný počet kníh na sklade');
                    return redirect()->route('cart.index');;
                }
                $cart[$id]['quantity'] = $request->quantity;
                $cart[$id]['price'] = $cart[$id]['quantity'] * $book->price;
                $this->storeCart($cart);
            }
        }
        return redirect()->back();
    }

    public function incrementQuantity(Request $request, $id)
    {
        $cart = $this->getCart();
        if(isset($cart[$id])){
            $book = Book::find($id);
            if ($book['stock_level'] < $cart[$id]['quantity'] + 1){
                $request->session()->flash('message', 'Nedostatočný počet kníh na sklade');
                return redirect()->back();
            }
            $cart[$id]['quantity'] += 1;
            $cart[$id]['price'] = $cart[$id]['quantity'] * $book->price;
            $this->storeCart($cart);
        }

        return redirect()->back();
    }

    public function decrementQuantity(Request $request, $id)
    {
        $cart = $this->getCart();
        if(isset($cart[$id])){
            if($cart[$id]['quantity']>1) {
                $book = Book::find($id);
                $cart[$id]['quantity'] -= 1;
                $cart[$id]['price'] = $cart[$id]['quantity'] * $book->price;
                $this->storeCart($cart);
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
            $this->storeCart($cart);
        }
        return redirect()->back();

    }
}
