@extends('layouts.app')

@section('css-stylesheet')
    <link href="{{asset('css/shopping_cart_stylesheet.css') }}" rel="stylesheet">
@endsection


@section('content')
    <main id="shopping-cart" class="block-text container">
        <h1>
            Nákupný košík
        </h1>
        <form method="POST" action="{{route('shippingPayment.store')}}">
            {{csrf_field()}}
            @foreach($cart as $cart_item)
                @include('components.shoppingCartItem')
            @endforeach

            @if(!count($cart))
                <div class="h4 text-center my-auto align-middle pt-5" style="height: 12em">
                    Nákupný košík je prázdny.
                </div>
            @else
                <div class="d-flex justify-content-end mb-4">
                    <span style="font-size: 1.5em"> Celková cena: {{number_format($total_price,2, '.', ' ')}} €</span>
                </div>
            @endif


            @if(count($cart))
                <div class="justify-content-end d-flex">
                <button class="btn basic-button" type="submit">
                    Pokračovať</button>
            </div>
            @endif
        </form>
    </main>
@endsection
