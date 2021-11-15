<div class="product col-lg-2 col-md-3 col-4">
    <div class="book-cover w-100">
        <a href="{{ route('books.show', $book->id) }}">
            <img src="{{asset($book->photo_path)}}" alt="Karel Gott - Umelecky a soukromy zivot kniha" class="img-fluid" width="120">
        </a>
    </div>
    <div class="book-title w-100">
        <a href="{{ route('books.show', $book->id) }}">{{$book->title}}</a>
    </div>
    <div class="author w-100">{{$book->author->name}}</div>
    <div class="book-price w-100">{{$book->price}}</div>
</div>
