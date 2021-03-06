@extends('layouts.app')

@section('css-stylesheet')
    <link href="{{asset('css/book_details_stylesheet.css') }}" rel="stylesheet">
@endsection

@section('navigation')
    @include('layouts.navigation')
@endsection

@section('content')
<main class="container-md px-0">
    <div class="d-flex flex-row  mt-2 sm-mb-5 mb-2 py-2 px-3 rounded-pill" style="background-color:#ed8e00">
        <nav aria-label="breadcrumb">
            <ol class=" my-auto breadcrumb">
                <li class="breadcrumb-item"><a  style="color: black;" href={{route('home')}}>Domov</a></li>
                <li class="breadcrumb-item"><a  style="color: black;" href="{{route('books.index')}}">Knihy</a></li>
                @if($book->category->parentCategory)
                    <li class="breadcrumb-item"><a  style="color: black;" href="{{route('books.index', ['category'=>$book->category->parentCategory->id])}}">{{$book->category->parentCategory->name}}</a></li>
                @endif
                <li class="breadcrumb-item"><a  style="color: black;" href="{{route('books.index', ['category'=>$book->category->id])}}">{{$book->category->name}}</a></li>
                <li class="breadcrumb-item active"  style="color: blue;" aria-current="page">{{$book->title}}</li>
            </ol>
        </nav>
    </div>
    <div class="row book-main-info">
        <div class="col-md-3 col-12 d-flex d-md justify-content-center">
            <img id="book-image" src="{{asset(env('IMG_PATH').$book->photo_path)}}" alt={{$book->title}}>
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
                    @for ($i = 1; $i <= 5; $i++)
                        <i class="fa fa-star"
                           @if($book->rating<$i)
                           style="color:silver;"
                            @endif
                        ></i>
                    @endfor
                    <br>
                    <span class="h3">
                        {{$book->price}} ???
                    </span>
                </div>
                <form method="POST" class="col-12 col-md-6" action="{{route('cart.store')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value={{$book->id}}>
{{--                <div class="col-12 col-md-6">--}}
                    <div class="d-flex justify-content-center">
                        Po??et kusov:
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="col-4 d-flex justify-content-end">
                            <button class="btn basic-button" onclick="minus_nop()" id="btn-minus" type="button">
                                <i class="fa fa-minus"></i></button>
                        </div>
                        <div class="col-4 d-inline-flex justify-content-center">
                                <input name="quantity" id="form_nop" value="1" class="text-center form-control d-inline-flex rounded-pill" style="width: 80px" type="text">
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

                        <button class="mt-3 btn basic-button" type="submit">
                            <i class="fa fa-shopping-cart"></i> Prida?? do ko????ka</button>
                    </div>
{{--                </div>--}}
                </form>
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
                <button id="show_more_button" class="btn basic-button" onclick="show_more()" type="button" style="font-weight: bold">Zobrazi?? viac</button>
            </div>
            <script>
                function show_more() {
                    if (document.getElementById("book_description").classList.item(1) === "thirteen-rows") {
                        document.getElementById("book_description").classList.remove("thirteen-rows");
                        document.getElementById("show_more_button").innerText = "Zobrazi?? menej";
                    }
                    else{
                        document.getElementById("book_description").classList.add("thirteen-rows")
                        document.getElementById("show_more_button").innerText = "Zobrazi?? viac";

                    }
                }
            </script>
        </div>
    </section>
    <section class="block-text mt-3">
        <h2>Detaily</h2>
        <div class=" p-3 row">
            <div class="col-12 col-sm-6">
                D??tum vydania: {{$book->publish_date}}<br>
                V??zba: {{$book->binding_type}}<br>
                Po??et str??n: {{$book->number_of_pages}}<br>
                @if ($book->stock_level < 10)
                Po??et na kn??h sklade: {{$book->stock_level}}
                @elseif($book->stock_level < 100)
                Po??et na kn??h sklade: 10+
                @else
                Po??et na kn??h sklade: 100+
                @endif
            </div>
            <div class="col-12 col-sm-6">
                ??as ????tania: {{$book->reading_time}} hod??n<br>
                Vydavate??stvo: {{$book->publisher}}<br>
                Jazyk: {{$book->language}}
            </div>
        </div>
    </section>
    <section class="mt-3">
        <h2>Recenzie</h2>
        <div class="block-text p-3" style="background-color: #e8d2b7; border-radius: 10px">
            @if((count($reviews)))
                @foreach($reviews as $k=>$review)
                    @include('components.review')
                @endforeach
                <div class="d-flex justify-content-center" style="background: none">
                    <button class="btn basic-button" id="show_reviews_button" onclick="change_text_button()" data-bs-toggle="collapse" data-bs-target=".review.collapse" style="font-weight: bold" type="button">Zobrazi?? viac</button>
                </div>
            @else
                <div class="d-flex justify-content-center">
                    <h3 class="mt-2 h5">??iande recenzie na zobrazenie</h3>
                </div>
            @endif
        </div>
    </section>
    <script>
        function change_text_button(){
            if (document.getElementById("show_reviews_button").innerText == "Zobrazi?? viac") {
                    document.getElementById("show_reviews_button").innerText = "Zobrazi?? menej";
                }
                else{
                    document.getElementById("show_reviews_button").innerText = "Zobrazi?? viac";
                }
        }
    </script>
</main>
@endsection


