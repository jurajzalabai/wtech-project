<section class="row product-listing mx-1">
    <div class="col-4 col-sm-2 m-auto text-center p-0">
        <a href={{route('books.show', $book->id)}}>
            <img src="{{asset($book->photo_path)}}" alt="{{$book->title}} kniha" class="img-fluid book-photo">
        </a>
    </div>
    <div class="col-8 col-sm-7 pe-0">
        <h2 class="book-title-listings" onclick="location.href='{{route('books.show', $book->id)}}'">
                {{$book->title}}
        </h2>
        <p class="author">{{$book->author->name}}</p>
        <p class="description">{{$book->description}}</p>
    </div>
    <div class="col-12 col-sm-3 d-sm-block text-sm-end d-flex justify-content-between px-0">
{{--        <div class="mb-2">--}}
{{--            <p class="book-price">{{$book->price}}</p>--}}
{{--            <div class="d-flex justify-content-end my-auto">--}}
{{--                @for ($i = 1; $i <= 5; $i++)--}}
{{--                    <i class="fa fa-star"--}}
{{--                       @if($book->rating<$i)--}}
{{--                       style="color:silver;"--}}
{{--                        @endif--}}
{{--                    ></i>--}}
{{--                @endfor--}}
{{--            </div>--}}
{{--        </div>--}}
        <form method="GET" action="{{ route('admin.edit', $book->id)}}" class="mb-4">
            {{csrf_field()}}
            <input type="hidden" name="id" value={{ $book->id }}>
            <button type="submit"  class="mt-2 btn btn-orange  mt-auto">
                Upraviť
            </button>
        </form>


        <form action="{{route('admin.destroy', $book->id)}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="mt-2 btn basic-button" data-bs-toggle="modal" data-bs-target="#confirmationPopup{{$book->book_id}}" type="button" style="font-size: 1.7em; background-color: unset;">
                <i class="fa fa-trash"></i>
            </button>

            <div class="modal fade" id="confirmationPopup{{$book->book_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Potvrdenie</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Naozaj chcete vymazať túto knihu ?
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nie</button>
                            <button type="submit" class="btn btn-primary">Áno, chcem ju vymazať</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
