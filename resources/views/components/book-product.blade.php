<section class="row product-listing mx-1">
    <div class="col-4 col-sm-2 m-auto text-center p-0">
        <a href={{route('books.show', $book->id)}}>
            <img src="{{asset(env('IMG_PATH').$book->photo_path)}}" alt="{{$book->title}} kniha" class="img-fluid book-photo">
        </a>
    </div>
    <div class="col-8 col-sm-7 pe-0">
        <h2 class="book-title-listings">
            <a href={{route('books.show', $book->id)}}>
                {{$book->title}}
            </a>
        </h2>
        <p class="author">{{$book->author->name}}</p>
        <p class="description">{{$book->description}}</p>
    </div>
    <div class="col-12 col-sm-3 d-sm-block text-sm-end d-flex justify-content-between px-0">
        <div class="mb-2">
            <p class="book-price">{{$book->price}}</p>
            <div class="d-flex justify-content-end my-auto">
                @for ($i = 1; $i <= 5; $i++)
                    <i class="fa fa-star"
                    @if($book->rating<$i)
                        style="color:silver;"
                    @endif
                    ></i>
                @endfor
            </div>
        </div>
        <form action="{{route('cart.store')}}" method="POST">
            {{csrf_field()}}
            <input type="hidden" name="id" value={{ $book->id }}>
            <button type="button" data-bs-toggle="modal" data-bs-target="#numberOfItemsPopup{{$book->id}}" class="btn btn-orange add-to-shopping-cart mt-auto">
                <i class="fa fa-shopping-cart fa-md h5"></i>
                Pridať do košíka
            </button>

            <div class="modal fade" id="numberOfItemsPopup{{$book->id}}" tabindex="-1" aria-labelledby="numberOfItemsLabel{{$book->id}}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="numberOfItemsLabel{{$book->id}}">Pridať do košíka</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex justify-content-center">
                                <div class="col-2 d-flex justify-content-center">
                                    Počet kusov:
                                </div>
                                <div class="col-3 d-flex justify-content-end">
                                    <button class="btn basic-button" onclick="minus_nop({{$book->id}})" type="button">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                                <div class="col-3 d-inline-flex justify-content-center">
                                    <input name="quantity" id="form_nop{{$book->id}}" value="1" class="text-center form-control d-inline-flex rounded-pill" style="width: 80px" type="text">
                                </div>
                                <div class="col-4 d-flex justify-content-start">
                                    <button onclick="plus_nop({{$book->id}})" class="btn basic-button" type="button">
                                        <i class="fa fa-plus"></i></button>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nepridávať</button>
                            <button type="submit" class="btn btn-primary">Pridať do košíka</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
