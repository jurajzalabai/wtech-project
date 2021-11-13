<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Knihy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{asset('css/book_details_stylesheet.css') }}" rel="stylesheet">
</head>
<body>

<header class="navbar navbar-expand-md navbar-dark sticky-md-top top-nav">
    <div class="container-lg">
        <a href="index.html" class="navbar-brand">
            <img src="{{asset('img/whitelogo3.png')}}" alt="BookStore logo" class="logo">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div id="navbar-menu" class="row col justify-content-end collapse navbar-collapse ">
            <div class="p-0 dropdown col-12 col-md-2 order-last order-md-first">
                <a class=" dropdown-toggle nav-link" href="#" role="button" data-toggle="dropdown" data-bs-toggle="dropdown">Knihy</a>
                <div class="dropdown-menu books-dropdown dropdown-large">
                    <nav class="row">
                        <ul class="col-12 col-sm-6 col-lg-4 ">
                            <li><a href="listing.html" class="h5">Beletria</a></li>
                            <li><a href="listing.html">Slovenská beletria</a></li>
                            <li><a href="listing.html">Detektívky</a></li>
                            <li><a href="listing.html">Sci-fi</a></li>
                            <li><a href="listing.html">Historické</a></li>
                            <li><a href="listing.html">Klasika</a></li>
                            <li><a href="listing.html">Romantika</a></li>
                        </ul>
                        <ul class="col-12 col-sm-6 col-lg-4 ">
                            <li><a href="listing.html" class="h5">Náučná literatúra</a></li>
                            <li><a href="listing.html">História</a></li>
                            <li><a href="listing.html">Technika</a></li>
                            <li><a href="listing.html">Zdravie a životný štýl</a></li>
                            <li><a href="listing.html">Hobby</a></li>
                            <li><a href="listing.html">Motivačná literatúra</a></li>
                        </ul>
                        <ul class="col-12 col-sm-6 col-md-4 ">
                            <li><a href="listing.html" class="h5">Pre deti a mládež</a></li>
                            <li><a href="listing.html">Pre najmenších</a></li>
                            <li><a href="listing.html">Pre prvákov</a></li>
                            <li><a href="listing.html">Pre teenagerov</a></li>
                            <li><a href="listing.html">Sci-fi, fantasy</a></li>
                        </ul>

                    </nav>

                </div>
            </div>

            <form class="form-inline d-flex col-md-6">
                <input class="form-control me-2 ml-2" type="search" placeholder="Zadajte názov knihy, kategóriu, autora...">
                <button class="btn btn-orange" type="submit">Hľadať</button>
            </form>
            <!--            <div class="col-4  d-flex justify-content-end">-->
            <div class="col-12 col-md-2 mt-md-0 mt-3 text-center text-md-end ">
                <button class="btn btn-orange px-md-2 py-1" onclick="location.href='login.html'" type="button">
                    <i class="fa fa-user fa-lg h5"></i>
                    Prihlásiť
                </button>
            </div>
            <div class="col-12 col-md-2 mt-md-0 mt-3 text-center text-md-end">
                <button class="btn btn-orange py-1 me-md-1" onclick="location.href='shopping_cart.html'" type="button">
                    <i class="fa fa-shopping-cart fa-lg h5"></i>
                    Košík
                </button>
            </div>
            <!--            </div>-->
        </div>
    </div>
</header>

<main class="container-sm">
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
                        Bill OReilly
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
</main>

<footer>
    <div class="row mt-5 py-3 mx-0" style="background-color: #111417">
        <div class="col-3 col-md-2">
            <a class="navbar-brand" href="#">
                <img src="./img/whitelogo3.png" alt="BookStore logo" class="logo">
            </a>
        </div>
        <div class="col-9 col-md-10">
            <div class="row">
                <nav class="col-12 row">
                    <div class="col-6 col-sm-3">
                        <a href="#">
                            Najčastejšie kladené otázky
                        </a>
                    </div>
                    <div class="col-6 col-sm-3">
                        <a href="#">
                            Kontakt
                        </a>
                    </div>
                    <div class="col-6 col-sm-3">
                        <a href="#">
                            Obchodné podmienky
                        </a>
                    </div>
                    <div class="col-6 col-sm-3">
                        <a href="#">
                            Doprava a platba
                        </a>
                    </div>
                </nav>
                <div class="col-12 mt-2" style="color: white">
                    Copyright (c) 2021 Kabi - Zali s.r.o.
                </div>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
