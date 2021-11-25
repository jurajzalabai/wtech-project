@extends('layouts.app')

@section('css-stylesheet')
    <link href="{{asset('css/book_details_stylesheet.css') }}" rel="stylesheet">
@endsection

@section('content')
    <main class="container-md px-0">
        {{--        <div class="d-flex flex-row  mt-2 sm-mb-5 mb-2 py-2 px-3 rounded-pill" style="background-color:#ed8e00">--}}
        {{--            <nav aria-label="breadcrumb">--}}
        {{--                <ol class=" my-auto breadcrumb">--}}
        {{--                    <li class="breadcrumb-item"><a  style="color: black;" href={{route('home')}}>Domov</a></li>--}}
        {{--                    <li class="breadcrumb-item"><a  style="color: black;" href="{{route('books.index')}}">Knihy</a></li>--}}
        {{--                    @if($book->category->parentCategory)--}}
        {{--                        <li class="breadcrumb-item"><a  style="color: black;" href="{{route('books.index', ['category'=>$book->category->parentCategory->id])}}">{{$book->category->parentCategory->name}}</a></li>--}}
        {{--                    @endif--}}
        {{--                    <li class="breadcrumb-item"><a  style="color: black;" href="{{route('books.index', ['category'=>$book->category->id])}}">{{$book->category->name}}</a></li>--}}
        {{--                    <li class="breadcrumb-item active"  style="color: blue;" aria-current="page">{{$book->title}}</li>--}}
        {{--                </ol>--}}
        {{--            </nav>--}}
        {{--        </div>--}}
        <form method="get" action="{{ route('admin.create')}}" enctype="multipart/form-data">
            @csrf
        <div class="row book-main-info">
            <div class="d-flex justify-content-around py-5">
                    <label for="image" class="col-form-label">Pridaj fotku</label>
                    <input type="file" class="form-control-file" id="image" name="image">
            </div>
        </div>
        <div>
            @if(Session::has('message'))
                @if (Session::get('message') == 'Nesprávne ste vložili obrázok')
                    <p class="alert alert-danger">{{ Session::get('message') }}</p>
                @else
                    <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif
            @endif
            <button id="change_book" class="btn basic-button" type="submit" style="font-weight: bold">Pridať knihu</button>
            <section  class="col-12 d-block justify-content-center">
                <label for="title">Názov:</label><br>
                <input id="title" name="title" required type="text" class="form-control rounded-pill form-width"><br>

                <label for="author">Autor:</label><br>
                <input id="author" name="author" required type="text" class="form-control rounded-pill form-width"><br>

                <label for="rating">rating:</label><br>
                <input id="rating" name="rating" required type="text" class="form-control rounded-pill form-width" ><br>

                <label for="price">Price:</label><br>
                <input id="price" name="price" required type="text" class="form-control rounded-pill form-width"><br>

            </section>
            <section class="block-text mt-3">
                <h2 class="mt-4">Popis</h2>
                <div class="p-3 ">
                    <label for="book_description"></label>
                    <input id="description" name="description" type="text" class="form-control rounded-pill form-width" value="">
                </div>
            </section>
            <section class="block-text mt-3">
                <h2>Detaily</h2>
                <div class=" p-3 row">
                    <div class="col-12 col-sm-6">
                        <label for="publish_date">Dátum vydania:</label><br>
                        <input id="publish_date" name="publish_date" required type="text" class="form-control rounded-pill form-width"><br>

                        <label for="stock_level">Zásoby: </label><br>
                        <input id="stock_level" name="stock_level" required type="text" class="form-control rounded-pill form-width"><br>

                        <label for="binding_type" style="font-size: 20px">Typ vazby:</label>
                        <br>
                            <input type="radio" id="strong" name="binding_type" value="Pevna vazba">
                            <label for="binding_type" style="font-size: 20px">Pevna</label>
                            <input type="radio" id="weak" name="binding_type" value="Makka vazba">
                            <label for="binding_type" style="font-size: 20px">Makka</label>
                        <br>
                        <br>
                        <label for="number_of_pages">Počet strán:</label><br>
                        <input id="number_of_pages" name="number_of_pages" required type="text" class="form-control rounded-pill form-width"><br>
                    </div>
                    <div class="col-12 col-sm-6">
                        <label for="reading_time">Čas čítania:</label><br>
                        <input id="reading_time" name="reading_time" required type="text" class="form-control rounded-pill form-width"><br>

                        <label for="publisher">Vydavateľstvo:</label><br>
                        <input id="publisher" name="publisher"  required type="text" class="form-control rounded-pill form-width"><br>


                        <label for="language">Jazyk:</label><br>
                        <input id="language" name="language"  required type="text" class="form-control rounded-pill form-width"><br>

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
                    </div>
                </div>
            </section>
{{--        <section class="mt-3">--}}
{{--            <h2>Recenzie</h2>--}}
{{--            <div class="block-text p-3" style="background-color: #e8d2b7; border-radius: 10px">--}}
{{--                    <div class="px-5 py-2 m-5">--}}
{{--                        <b>Pridaj recenziu:</b> <br>--}}
{{--                        <label for="review_author" class="pt-3">Autor:</label><br>--}}
{{--                        <input id="review_author" name="review_author" required type="text" class="form-control rounded-pill form-width"><br>--}}

{{--                        <label for="review_rating">Hodnotenie:</label><br>--}}
{{--                        <input id="review_rating" name="review_rating" required type="text" class="form-control rounded-pill form-width"><br>--}}

{{--                        <label for="review_description">Popis:</label><br>--}}
{{--                        <input id="review_description" name="review_description" required type="text" class="form-control rounded-pill form-width"><br>--}}
{{--                        <div  class="d-flex justify-content-center">--}}
{{--                            <button type="button" class=" btn btn-primary">Pridaj recenziu</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--        <script>--}}
{{--            // document.getElementsByClassName("review-button").addEventListener("click", nieco);--}}
{{--            function change_text_button(){--}}
{{--                if (document.getElementById("show_reviews_button").innerText == "Zobraziť viac") {--}}
{{--                    document.getElementById("show_reviews_button").innerText = "Zobraziť menej";--}}
{{--                }--}}
{{--                else{--}}
{{--                    document.getElementById("show_reviews_button").innerText = "Zobraziť viac";--}}
{{--                }--}}
{{--            }--}}
{{--        </script>--}}
        </div>
        </form>
    </main>
@endsection
