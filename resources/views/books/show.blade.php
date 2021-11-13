@extends('layouts.app')

@section('css-stylesheet')
    <link href="{{asset('css/main_pages_stylesheet.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="d-flex flex-row  my-5 py-3 px-4 rounded-pill" style="background-color:#ed8e00">
        <nav aria-label="breadcrumb">
            <ol class=" my-auto breadcrumb">
                <li class="breadcrumb-item"><a  style="color: black;" href={{route('dashboard')}}>Home</a></li>
                <li class="breadcrumb-item"><a  style="color: black;" href="#">Library</a></li>
                <li class="breadcrumb-item"><a  style="color: black;" href="#">Beletria</a></li>
                <li class="breadcrumb-item active"  style="color: blue;" aria-current="page">Kniha - Karel Gott</li>
            </ol>
        </nav>
    </div>
    <div class="row book-main-info">
        <div class="col-md-3 col-12 d-flex d-md justify-content-center">
            <img id="book-image" src="{{asset('img/book170px.png')}}" alt="Karel Gott - Umělecký a soukromý život kniha">
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
                            <button class="btn basic-button" type="button">
                                <i class="fa fa-minus"></i></button>
                        </div>
                        <div class="col-4 d-inline-flex justify-content-center">
                            <form >
                                <input class="form-control  d-inline-flex rounded-pill" style="width: 80px" type="text">
                            </form>
                        </div>
                        <div class="col-4">
                            <button class="btn basic-button" type="button">
                                <i class="fa fa-plus"></i></button>
                        </div>
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
            <p class="thirteen-rows mb-0">
                {{$book->description}}
            </p>
            <div class="d-flex justify-content-center pt-3">
                <button class="btn basic-button" onclick="location.href='#'" type="button"><b>Zobraziť viac</b></button>
            </div>
        </div>
    </section>
    <section class="block-text mt-3">
        <h2>Detaily</h2>
        <div class=" p-3 row">
            <div class="col-12 col-sm-6">
                Dátum vydania: {{$book->publish_date}}<br>
                Väzba:{{$book->binding_type}}<br>
                Počet strán: {{$book->page_number}}
            </div>
            <div class="col-12 col-sm-6">
                Čas čítania: {{$book->reading_time}}<br>
                Vydavateľstvo:{{$book->publisher}}<br>
                Jazyk:{{$book->language}}
            </div>
        </div>
    </section>
    <section class="mt-3">
        <h2>Recenzie</h2>
        <div class="block-text p-3" style="background-color: #e8d2b7; border-radius: 10px">
            <div class="review">
                <h3 class="mt-2 h5">Jozko Mrkvicka</h3>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <p class="three-rows">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at nunc dui. Vivamus nulla ligula,
                    porttitor sed dui sit amet, imperdiet lobortis purus. Pellentesque augue est, euismod id metus nec,
                    tincidunt semper elit. Sed dapibus lectus porta nisi mattis, eu rutrum mi porttitor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at nunc dui. Vivamus nulla ligula,
                    porttitor sed dui sit amet, imperdiet lobortis purus.</p>
                <button class="btn basic-button" onclick="location.href='#'" type="button"><b>Zobraziť viac</b></button>
            </div>
            <div class="review">
                <h3 class="mt-2">Jozko Mrkvicka</h3>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <br>
                <p class="three-rows">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at nunc dui. Vivamus nulla ligula,
                    porttitor sed dui sit amet, imperdiet lobortis purus. Pellentesque augue est, euismod id metus nec,
                    tincidunt semper elit. Sed dapibus lectus porta nisi mattis, eu rutrum mi porttitor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at nunc dui. Vivamus nulla ligula,
                    porttitor sed dui sit amet, imperdiet lobortis purus.</p>
                <button class="btn basic-button" onclick="location.href='#'" type="button"><b>Zobraziť viac</b></button>
            </div>
            <div class="d-flex justify-content-center" style="background: none">
                <button class="btn basic-button" onclick="location.href='#'" type="button"><b>Zobraziť viac</b></button>
            </div>
        </div>
    </section>
@endsection
