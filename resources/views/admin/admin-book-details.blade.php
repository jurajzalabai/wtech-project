@extends('layouts.app')

@section('css-stylesheet')
    <link href="{{asset('css/book_details_stylesheet.css') }}" rel="stylesheet">
@endsection

@section('content')
    <main class="container-md px-0">
        <div class="row book-main-info">
            <div class="col-md-12 d-flex d-md justify-content-center pt-3">
                <img id="book-image" src="{{asset($book->photo_path)}}" alt={{$book->title}}>
            </div>
            <div class="d-flex justify-content-around py-5">
                <form action="{{route('admin.picture')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{$book->id}}">
                    <label for="image" class="col-form-label">Pridaj fotku</label>
                    <input type="file" class="form-control-file" id="image" name="image">

                    <button id="add_picture_button" class="btn basic-button" type="submit" style="font-weight: bold">Pridať obrázok</button>
                </form>
                <form action="{{route('admin.destroy', $book->id)}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="mt-2 btn basic-button" data-bs-toggle="modal" data-bs-target="#confirmationPopup{{$book->book_id}}" type="button" style="font-size: 1.7em; background-color: unset;" >
                        <i class="fa fa-trash"></i></button>

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
        </div>
        <form method="post" action="{{ route('admin.change', $book)}}">
            @csrf
            <input type="hidden" id="id" name="id" value="{{$book->id}}">
            @if(Session::has('message'))
                @if (Session::get('message') == 'Nesprávne ste vložili obrázok')
                    <p class="alert alert-danger">{{ Session::get('message') }}</p>
                @else
                <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif
            @endif
            <button id="change_book" class="btn basic-button" type="submit" style="font-weight: bold">Zmenit</button>
            <section  class="col-12 d-block justify-content-center">
                <label for="title">Názov:</label><br>
                <input id="title" name="title" required type="text" class="form-control rounded-pill form-width" value="{{$book->title}}"><br>

                <label for="author">Autor:</label><br>
                <input id="author" name="author" required type="text" class="form-control rounded-pill form-width" value="{{$book->author->name}}"><br>

                <label for="rating">rating:</label><br>
                <input id="rating" name="rating" required type="text" class="form-control rounded-pill form-width" value="{{$book->rating}}"><br>

                <label for="price">Price:</label><br>
                <input id="price" name="price" required type="text" class="form-control rounded-pill form-width" value="{{$book->price}}"><br>

            </section>
        <section class="block-text mt-3">
            <h2 class="mt-4">Popis</h2>
            <div class="p-3 ">
                <label for="book_description"></label>
                <input id="description" name="description" type="text" class="form-control rounded-pill form-width" value="{{$book->description}}">
            </div>
        </section>
        <section class="block-text mt-3">
            <h2>Detaily</h2>
            <div class=" p-3 row">
                <div class="col-12 col-sm-6">
                    <label for="publish_date">Dátum vydania::</label><br>
                    <input id="publish_date" name="publish_date" required type="text" value="{{$book->publish_date}}" class="form-control rounded-pill form-width"><br>

                    <label for="binding_type" style="font-size: 20px">Typ vazby:</label>
                    <br>
                    @if($book->binding_type == "Pevna vazba")
                        <input type="radio" id="strong" name="binding_type" value="Pevna vazba" checked>
                        <label for="binding_type" style="font-size: 20px">Pevna</label>
                        <input type="radio" id="weak" name="binding_type" value="Makka vazba">
                        <label for="binding_type" style="font-size: 20px">Makka</label>
                    @elseif($book->binding_type == "Makka vazba")
                        <input type="radio" id="strong" name="binding_type" value="Pevna vazba">
                        <label for="binding_type" style="font-size: 20px">Pevna</label>
                        <input type="radio" id="weak" name="binding_type" value="Makka vazba" checked>
                        <label for="binding_type" style="font-size: 20px">Makka</label>
                    @endif
                    <br>
                    <br>
                    <label for="number_of_pages">Počet strán:</label><br>
                    <input id="number_of_pages" name="number_of_pages" value="{{$book->number_of_pages}}" required type="text" class="form-control rounded-pill form-width"><br>

                        <label for="category">Zvoľte kategóriu:</label>
                        <select name="category" id="category">
                            <option value="1">Beletria</option>
                            <option value="2">Náučná literatúra</option>
                            <option value="3">Pre deti a mládež</option>
                            <optgroup label="Beletria">
                                <option value="4">Slovenská beletria</option>
                                <option value="5">Detektívky</option>
                                <option value="6">Sci-Fi</option>
                                <option value="7">Historické</option>
                                <option value="8">Klasika</option>
                                <option value="9">Romantika</option>
                            </optgroup>
                            <optgroup label="Náučná literatúra">
                                <option value="10">Historické</option>
                                <option value="11">Technika</option>
                                <option value="12">Zdravý životný štýl</option>
                                <option value="13">Hobby</option>
                                <option value="14">Motivačná literatúra</option>
                            </optgroup>
                            <optgroup label="Pre deti a mládež">
                                <option value="15">Pre najmenších</option>
                                <option value="16">Pre prvákov</option>
                                <option value="17">Pre teenagerov</option>
                                <option value="18">Sci-Fi</option>
                                <option value="19">Fantasy</option>
                            </optgroup>
                        </select>
                        <br><br>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="reading_time">Čas čítania:</label><br>
                    <input id="reading_time" name="reading_time" required type="text" value="{{$book->reading_time}}" class="form-control rounded-pill form-width"><br>

                    <label for="publisher">Vydavateľstvo:</label><br>
                    <input id="publisher" name="publisher" value="{{$book->publisher}}" required type="text" class="form-control rounded-pill form-width"><br>


                    <label for="language">Jazyk:</label><br>
                    <input id="language" name="language" value="{{$book->language}}" required type="text" class="form-control rounded-pill form-width"><br>
                </div>
            </div>
        </section>
        </form>
        <section class="mt-3">
            <h2>Recenzie</h2>
            <div class="block-text p-3" style="background-color: #e8d2b7; border-radius: 10px">

                <form action="{{route('admin.review')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="px-5 py-2 m-5">
                        <input type="hidden" id="book_id" name="book_id" value="{{$book->id}}">
                        <b>Pridaj recenziu:</b> <br>
                        <label for="review_author" class="pt-3">Autor:</label><br>
                        <input id="review_author" name="review_author" required type="text" class="form-control rounded-pill form-width"><br>

                        <label for="review_rating">Hodnotenie:</label><br>
                        <input id="review_rating" name="review_rating" required type="text" class="form-control rounded-pill form-width"><br>

                        <label for="review_description">Popis:</label><br>
                        <input id="review_description" name="review_description" required type="text" class="form-control rounded-pill form-width"><br>
                        <div  class="d-flex justify-content-center">
                            <button type="submit" class=" btn btn-primary">Pridaj recenziu</button>
                        </div>
                    </div>

                </form>
                @if((count($reviews)))
                    @foreach($reviews as $k=>$review)
                        @include('components.review')
                    @endforeach
                    <div class="d-flex justify-content-center" style="background: none">
                        <button class="btn basic-button" id="show_reviews_button" onclick="change_text_button()" data-bs-toggle="collapse" data-bs-target=".review.collapse" style="font-weight: bold" type="button">Zobraziť viac</button>
                    </div>
                @else
                    <div class="d-flex justify-content-center">
                        <h3 class="mt-2 h5">Žiande recenzie na zobrazenie</h3>
                    </div>
                @endif
            </div>
        </section>
        <script>
            // document.getElementsByClassName("review-button").addEventListener("click", nieco);
            function change_text_button(){
                if (document.getElementById("show_reviews_button").innerText == "Zobraziť viac") {
                    document.getElementById("show_reviews_button").innerText = "Zobraziť menej";
                }
                else{
                    document.getElementById("show_reviews_button").innerText = "Zobraziť viac";
                }
            }

            // function nieco(e) {
            // console.log(ev.parent);

            // var ev = e || window.event;
            // console.log(ev);
            // if ( ev.innerText === "Zobraziť viac"){
            //     ev.parent.getElementsByTagName("p")[0].classList.remove("three-rows");
            // }
            // else{

            // }
            // if (document.getElementById("review").classList.item(1) == "three-rows") {
            //     document.getElementById("review").classList.remove("three-rows");
            //     document.getElementById("review_button").innerText = "Zobraziť menej";
            // }
            // else{
            //     document.getElementById("review").classList.add("three-rows")
            //     document.getElementById("review_button").innerText = "Zobraziť viac";
            // }
            // }
        </script>
    </main>
@endsection
