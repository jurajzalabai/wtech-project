<section class="row py-3 px-sm-3 mb-5">
    <div class="col-12 col-sm-3 col-md-2">
        <div class="d-flex justify-content-center">
            <img class="book-image" src="{{asset($cart_item['photo_path'])}}" alt="{{$cart_item['title']}} kniha" >
        </div>
    </div>
    <div class="col-12 col-sm-9 col-md-7">
        <h2 class="one-row h5">
            <a href="book_details.html">
                {{$cart_item['title']}}
            </a>
        </h2>
        <span class="one-row">
                   {{$cart_item['author']}}
                </span>
        <div class="mt-4 d-flex justify-content-sm-start justify-content-center">
            Počet kusov:
        </div>
        <div class="d-flex justify-content-sm-start justify-content-center">
            <form method="post" action="{{ route('cart.decrement', $cart_item['book_id']) }}">
                @method('PUT')
                @csrf
                <button class="btn basic-button" type="submit">
                    <i class="fa fa-minus"></i></button>
            </form>
            <form class="m-0 mx-2">
                <input class="form-control d-inline-flex rounded-pill" value="{{$cart_item['quantity']}}" style="width: 80px" type="text">
            </form>
            <form method="post" action="{{ route('cart.increment', $cart_item['book_id']) }}">
                @method('PUT')
                @csrf
                <button class="btn basic-button" type="submit">
                    <i class="fa fa-plus"></i></button>
            </form>
        </div>
    </div>
    <div class="col-sm-12 col-md-3">
        <div class="row">
            <div class="col-8 col-md-12">
                <div class="col-12 col-md-12 d-flex justify-content-md-end mt-2">
                    <span class="h3">{{$cart_item['price']}} €</span>
                </div>
                <div class="col-6 col-md-12 d-flex justify-content-md-end" style="font-size: 1em;">
                    @for ($i = 1; $i <= $cart_item['rating']; $i++)
                        <i class="fa fa-star"></i>
                    @endfor
                </div>
            </div>
            <div class="col-4 col-md-12 d-flex justify-content-end">
                <form action="{{route('cart.destroy', $cart_item['book_id'])}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="mt-2 btn basic-button" type="submit" style="font-size: 1.7em; background-color: unset;" >
                        <i class="fa fa-trash"></i></button>
                </form>
            </div>
        </div>
    </div>
</section>
