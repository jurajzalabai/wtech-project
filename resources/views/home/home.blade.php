@extends('layouts.app')


@section('css-stylesheet')
    <link href="{{asset('css/main_pages_stylesheet.css') }}" rel="stylesheet">
@endsection


@section('content')
<main class="container-md">
    <div id="banner" class="carousel slide my-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#banner" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#banner" data-bs-slide-to="1"></button>
            <!--            <button type="button" data-bs-target="#banner" data-bs-slide-to="2"></button>-->
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/banner1.jpg" alt="Banner s knihou" class="d-block w-100"
                     srcset="img/banner1_720.jpg 720w,
                             img/banner1.jpg 1920w"
                     sizes="(max-width: 767) 720px,
                             1920px">
            </div>

            <div class="carousel-item">
                <img src="img/banner3.jpg" alt="Banner s knihou" class="d-block w-100"
                     srcset="img/banner3_720.jpg 720w,
                             img/banner3.jpg 1920w"
                     sizes="(max-width: 767) 720px,
                             1920px">
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#banner" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#banner" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <section class="row col-gap">
        <h2><a href="listing.html">Najpredávanejšie</a></h2>
        @foreach($latest as $book)
            @include('components.book-home-product')
        @endforeach
    </section>
    <section class="row my-5">
        <h2><a href="listing.html">Najnovšie</a></h2>
        @foreach($best_selling as $book)
            @include('components.book-home-product')
        @endforeach
    </section>


    <div class="row mb-4 justify-content-center">
        <div class="col-md-3 col-sm-5 col-10 mx-3 notice d-flex my-2 py-2 justify-content-center">
            <i class="fa fa-book fa-2x my-auto"></i>
            <span class="h5 my-auto mx-2">{{$book_count}} kníh v ponuke</span>
        </div>
        <div class="col-md-3 col-sm-5 col-10 mx-3 notice d-flex my-2 py-2 justify-content-center">
            <i class="fa fa-cubes fa-2x my-auto"></i>
            <span class="h5 my-auto mx-2">{{$book_active_count}} kníh na sklade</span>
        </div>
        <div class="col-md-3 col-sm-5 col-10 mx-3 notice d-flex my-2 py-2 justify-content-center">
            <i class="fa fa-truck fa-2x my-auto"></i>
            <span class="h5 my-auto mx-2">doručenie do 48 hodín</span>
        </div>


    </div>
</main>
@endsection


