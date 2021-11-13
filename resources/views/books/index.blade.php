<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Beletria | BookStore </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/main_pages_stylesheet.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>

<header class="navbar navbar-expand-md navbar-dark sticky-md-top top-nav">
    <div class="container-lg">
        <a href="index.html" class="navbar-brand">
            <img src="../xkabac_xzalabaij_project/wtech-project/public/img/whitelogo3.png" alt="BookStore logo" class="logo">
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

<main class="container-md px-0">
    <nav aria-label="breadcrumb" class="breadcrumb py-2 ps-3 m-2 rounded-pill">
        <ol class="my-auto breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Library</a></li>
            <li class="breadcrumb-item active" style="color: blue;" aria-current="page"><a href="#">Beletria</a></li>
        </ol>
    </nav>
    <div class="row mx-0">
        <div class="col-12 col-md-3 p-0 ">
            <section class="side-menu collapse show px-3 py-2" id="side-menu" aria-expanded="true">
                <h2 class="h3">Kategória</h2>
                <ul class="col-12 px-1">
                    <li><a href="" class="h5">Beletria</a></li>
                    <li><a href="">Slovenská beletria</a></li>
                    <li><a href="">Detektívky</a></li>
                    <li><a href="">Sci-fi</a></li>
                    <li><a href="">Historické</a></li>
                    <li><a href="">Klasika</a></li>
                    <li><a href="">Romantika</a></li>
                    <li><a href="" class="h5">Náučná literatúra</a></li>
                    <li><a href="">História</a></li>
                    <li><a href="">Technika</a></li>
                    <li><a href="">Zdravie a životný štýl</a></li>
                    <li><a href="">Hobby</a></li>
                    <li><a href="">Motivačná literatúra</a></li>
                    <li><a href="" class="h5">Pre deti a mládež</a></li>
                    <li><a href="">Pre najmenších</a></li>
                    <li><a href="">Pre prvákov</a></li>
                    <li><a href="">Pre teenagerov</a></li>
                    <li><a href="">Sci-fi, fantasy</a></li>
                </ul>

                <form action="#" method="get" class="price-filter">
                    <label for="price-min">Cena od</label>
                    <br>
                    <input type="text" name="minimal-price" value="0" id="price-min">
                    <br>
                    <label for="price-max">Cena do</label>
                    <br>
                    <input type="text" name="maximum-price" value="125" id="price-max">
                    <br>
                    <button class="btn btn-orange my-2" type="submit">Filtrovať podľa ceny</button>
                </form>

                <div class="check-boxes">
                    <section>
                        <h3 class="h5">Jazyk</h3>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="slovak-check-box">
                            <label for="slovak-check-box" class="form-check-label">
                                Slovenský
                            </label>

                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="czech-check-box">
                            <label for="czech-check-box" class="form-check-label">
                                Český
                            </label>

                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="english-check-box">
                            <label for="english-check-box" class="form-check-label">
                                Anglický
                            </label>

                        </div>
                    </section>

                    <section>
                        <h3 class="h5">Dostupnosť</h3>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="available-check-box">
                            <label for="available-check-box" class="form-check-label">
                                Na sklade
                            </label>

                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="available-soon-check-box">
                            <label for="available-soon-check-box" class="form-check-label">
                                Čoskoro dostupné
                            </label>

                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="unavailable-check-box">
                            <label for="unavailable-check-box" class="form-check-label">
                                Vypredané
                            </label>

                        </div>
                    </section>


                    <section>
                        <h3 class="h5">Typ väzby</h3>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="hard-cover-check-box">
                            <label for="hard-cover-check-box" class="form-check-label">
                                Pevná väzba
                            </label>

                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="soft-cover-check-box">
                            <label for="soft-cover-check-box" class="form-check-label">
                                Mäkká väzba
                            </label>

                        </div>

                    </section>
                </div>

            </section>
            <div class="col-12 text-center d-block d-md-none my-2">
                <button data-bs-toggle="collapse" data-bs-target="#side-menu" type="button" class="btn btn-orange">
                    <i class="fa fa-filter fa-lg"></i>
                    Zobraziť filtrovanie
                </button>
            </div>
        </div>

        <section class="col px-0">
            <div class="row justify-content-between mx-1">
                <h1 class="col-auto px-0">Beletria</h1>
                <div class="col-auto my-auto d-flex px-0">
                    <div class="dropdown">
                        <button class="btn btn-orange dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            najlacnejšie
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><button class="dropdown-item">najlacnejšie</button></li>
                            <li><button class="dropdown-item">najpredávanejšie</button></li>
                            <li><button class="dropdown-item">najnovšie</button></li>
                        </ul>
                    </div>
                </div>
            </div>

            @foreach($books as $book)
            <section class="row product-listing mx-1">
                <div class="col-4 col-sm-2 m-auto text-center p-0">
                    <a href="book_details.html">
                        <img src="{{asset($book->photo_path)}}" alt="Karel Gott - umelecky a soukromy zivot kniha" class="img-fluid">
                    </a>
                </div>
                <div class="col-8 col-sm-7 pe-0">
                    <h2 class="book-title-listings">
                        <a href="book_details.html">
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
                    <button class="btn btn-orange add-to-shopping-cart mt-auto">
                        <i class="fa fa-shopping-cart fa-md h5"></i>
                        Pridať do košíka
                    </button>
                </div>
            </section>
            @endforeach

            <nav id="pagination" class="my-5">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </section>
    </div>
</main>


<footer>
    <div class="row mt-5 py-3 mx-0" style="background-color: #111417">
        <div class="col-3 col-md-2">
            <a class="navbar-brand" href="#">
                <img src="../xkabac_xzalabaij_project/wtech-project/public/img/whitelogo3.png" alt="BookStore logo" class="logo">
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
