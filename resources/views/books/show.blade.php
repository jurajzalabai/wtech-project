@extends('layouts.app')

@section('css-stylesheet')
    <link href="{{asset('css/book_details_stylesheet.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="d-flex flex-row  my-5 py-3 px-4 rounded-pill" style="background-color:#ed8e00">
        <nav aria-label="breadcrumb">
            <ol class=" my-auto breadcrumb">
                <li class="breadcrumb-item"><a  style="color: black;" href={{route('home')}}>Home</a></li>
                <li class="breadcrumb-item"><a  style="color: black;" href="#">Library</a></li>
                <li class="breadcrumb-item"><a  style="color: black;" href="#">Beletria</a></li>
                <li class="breadcrumb-item active"  style="color: blue;" aria-current="page">{{$book->title}}</li>
            </ol>
        </nav>
    </div>
    <div class="row book-main-info">
        <div class="col-md-3 col-12 d-flex d-md justify-content-center">
            <img id="book-image" src="{{asset($book->photo_path)}}" alt={{$book->title}}>
        </div>
        <section  class="col-md-9 col-sm-12">
            <h1 class="pb-4 three-rows">
                {{$book->title}}
            </h1>
            <div class="row">
                <div class="col-12 col-md-6">
                    <span class="two-rows h4">
                        {{$book->author->name}}
                    </span>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <br>
                    <span class="h3">
                        {{$book->price}} €
                    </span>
                </div>

                <div class="col-12 col-md-6">
                    <div class="d-flex justify-content-center">
                        Počet kusov:
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="col-4 d-flex justify-content-end">
                            <button class="btn basic-button" onclick="minus_nop()" id="btn-minus" type="button">
                                <i class="fa fa-minus"></i></button>
                        </div>
                        <div class="col-4 d-inline-flex justify-content-center">
                            <form >
                                <input id="form_nop" value="1" class="text-center form-control d-inline-flex rounded-pill" style="width: 80px" type="text">
                            </form>
                        </div>
                        <div class="col-4">
                            <button onclick="plus_nop()" class="btn basic-button" type="button">
                                <i class="fa fa-plus"></i></button>
                        </div>
                        <script>
                            function plus_nop() {
                                document.getElementById("form_nop").value = Number(document.getElementById("form_nop").value) + 1;
                            }
                            function minus_nop() {
                                if (Number(document.getElementById("form_nop").value) > 1) {
                                    document.getElementById("form_nop").value = Number(document.getElementById("form_nop").value) - 1;
                                }
                            }
                        </script>
                    </div>
                    <div  class="d-flex justify-content-center">
                        <button class="mt-3 btn basic-button" onclick="location.href='#'" type="button">
                            <i class="fa fa-shopping-cart"></i> Pridať do košíka</button>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <section class="block-text mt-3">
        <h2 class="mt-4">Popis</h2>
        <div class="p-3 ">
            <p id="book_description" class="mb-0 thirteen-rows">
                {{$book->description}} {{$book->description}} {{$book->description}}  {{$book->description}} {{$book->description}}{{$book->description}} {{$book->description}} {{$book->description}}
            </p>
            <div class="d-flex justify-content-center pt-3">
                <button id="show_more_button" class="btn basic-button" onclick="show_more()" type="button" style="font-weight: bold">Zobraziť viac</button>
            </div>
            <script>
                function show_more() {
                    if (document.getElementById("book_description").classList.item(1) == "thirteen-rows") {
                        document.getElementById("book_description").classList.remove("thirteen-rows");
                        document.getElementById("show_more_button").innerText = "Zobraziť menej";
                    }
                    else{
                        document.getElementById("book_description").classList.add("thirteen-rows")
                        document.getElementById("show_more_button").innerText = "Zobraziť viac";

                    }
                }
            </script>
        </div>
    </section>
    <section class="block-text mt-3">
        <h2>Detaily</h2>
        <div class=" p-3 row">
            <div class="col-12 col-sm-6">
                Dátum vydania: {{$book->publish_date}}<br>
                Väzba: {{$book->binding_type}}<br>
                Počet strán: {{$book->page_number}}
            </div>
            <div class="col-12 col-sm-6">
                Čas čítania: {{$book->reading_time}}<br>
                Vydavateľstvo: {{$book->publisher}}<br>
                Jazyk: {{$book->language}}
            </div>
        </div>
    </section>
    <section class="mt-3">
        <h2>Recenzie</h2>
        <div class="block-text p-3" style="background-color: #e8d2b7; border-radius: 10px">
            @foreach($reviews as $review)
            <div class="review">
                <h3 class="mt-2 h5">{{$review->username}}</h3>
                @for ($i = 1; $i <= $review->rating; $i++)
                    <i class="fa fa-star"></i>
                @endfor
                <p id="review{{$review->id}}" class="three-rows">{{$review->id}}{{$review->review_text}}{{$review->review_text}}{{$review->review_text}}</p>
                <button id="review_button{{$review->id}}" class="btn basic-button" onclick="show_more_review{{$review->id}}()" type="button" style="font-weight: bold">Zobraziť viac</button>
                <script>
                    function show_more_review{{$review->id}}() {
                        if (document.getElementById("review{{$review->id}}").classList.item(1) == "three-rows") {
                            document.getElementById("review{{$review->id}}").classList.remove("three-rows");
                            document.getElementById("review_button{{$review->id}}").innerText = "Zobraziť menej";
                        }
                        else{
                            document.getElementById("review{{$review->id}}").classList.add("three-rows")
                            document.getElementById("review_button{{$review->id}}").innerText = "Zobraziť viac";
                        }
                    }
                </script>
            </div>
            @endforeach
            <div class="d-flex justify-content-center" style="background: none">
                <button class="btn basic-button" onclick="show_more_reviews()" type="button"><b>Zobraziť viac</b></button>
            </div>
        </div>
    </section>
@endsection
