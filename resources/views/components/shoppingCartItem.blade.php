<section class="row py-3 px-sm-3 mb-5">
    <div class="col-12 col-sm-3 col-md-2">
        <div class="d-flex justify-content-center">
            <img class="book-image" src="{{asset(env('IMG_PATH').$cart_item['photo_path'])}}" alt="{{$cart_item['title']}} kniha" >
        </div>
    </div>
    <div class="col-12 col-sm-9 col-md-7">
        <h2 class="one-row h5">
            <a href="{{route('books.show', $cart_item['book_id'])}}">
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
                <input class="text-center form-control d-inline-flex rounded-pill" value="{{$cart_item['quantity']}}" style="width: 80px" type="text">
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
                    <span class="h3">{{number_format($cart_item['price'],2, '.', ' ')}} €</span>
                </div>
                <div class="col-6 col-md-12 d-flex justify-content-md-end" style="font-size: 1em;">
                    @for ($i = 1; $i <= 5; $i++)
                        <i class="fa fa-star"
                        @if($cart_item['rating']<$i)
                            style="color:silver;"
                        @endif
                            ></i>
                    @endfor
                </div>
            </div>
            <div class="col-4 col-md-12 d-flex justify-content-end">
                <form action="{{route('cart.destroy', $cart_item['book_id'])}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="mt-2 btn basic-button" data-bs-toggle="modal" data-bs-target="#confirmationPopup{{$cart_item['book_id']}}" type="button" style="font-size: 1.7em; background-color: unset;" >
                        <i class="fa fa-trash"></i></button>

                    <div class="modal fade" id="confirmationPopup{{$cart_item['book_id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Potvrdenie</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                   Naozaj chcete vymazať tento produkt z košíka ?
                                </div>
                                <div class="modal-footer d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nie</button>
                                    <button type="submit" class="btn btn-primary">Áno, chcem ho vymazať</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
</section>
