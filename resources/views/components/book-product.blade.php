<section class="row product-listing mx-1">
    <div class="col-4 col-sm-2 m-auto text-center p-0">
        <a href={{route('books.show', $book->id)}}>
            <img src="{{asset($book->photo_path)}}" alt="{{$book->title}} kniha" class="img-fluid">
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
                <i class="fa fa-star "></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
        </div>
        <form action={{route('cart.store')}} method="POST">
            {{csrf_field()}}
            <input type="hidden" name="id" value={{ $book->id }}>
            <button type="submit" class="btn btn-orange add-to-shopping-cart mt-auto">
                <i class="fa fa-shopping-cart fa-md h5"></i>
                Pridať do košíka
            </button>
        </form>
    </div>
</section>
