@extends('layouts.app')

@section('css-stylesheet')
    <link href="{{asset('css/shopping_cart_stylesheet.css') }}" rel="stylesheet">
@endsection


@section('content')
    <main id="shopping-cart" class="block-text container">
        <h1>
            Nákupný košík
        </h1>
        <form method="POST" action="{{route('shippingPayment')}}">
            {{csrf_field()}}
            @foreach($cart as $cart_item)
                @include('components.shoppingCartItem')
            @endforeach

            @if(!count($cart))
                <div class="h4 text-center my-auto align-middle pt-5" style="height: 12em">
                    Nákupný košík je prázdny.
                </div>
            @endif

            @if(count($cart))
{{--                <input type="array" id="cart" name="cart" value="{{$cart}}" />--}}
                <div class="justify-content-end d-flex">
                <button class="btn basic-button" type="submit">
                    Pokračovať</button>
            </div>
            @endif
        </form>
    </main>
@endsection
