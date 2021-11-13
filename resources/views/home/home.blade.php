<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>BookStore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{asset('css/main_pages_stylesheet.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<header class="navbar navbar-expand-md navbar-dark sticky-md-top top-nav">
    <div class="container-lg">
        <a href="index.html" class="navbar-brand">
            <img src="img/whitelogo3.png" alt="logo" class="logo">
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
        <div class="product col-lg-2 col-md-3 col-4">
            <div class="book-cover w-100">
                <a href="book_details.html">
                    <img src="img/book120px.png" alt="Karel Gott - Umelecky a soukromy zivot kniha" class="img-fluid" width="120">
                </a>
            </div>
            <div class="book-title w-100">
                <a href="book_details.html">Karel Gott - Umelecky a soukromy zivot  </a>
            </div>
            <div class="author w-100">Bill O'reily</div>
            <div class="book-price w-100">21.43</div>
        </div>

        <div class="product col-lg-2 col-md-3 col-4">
            <div class="book-cover w-100">
                <a href="book_details.html">
                    <img src="img/book120px.png" alt="Karel Gott - Umelecky a soukromy zivot kniha" class="img-fluid" width="120">
                </a>
            </div>
            <div class="book-title w-100">
                <a href="book_details.html">Karel Gott - Umelecky a soukromy zivot</a>
            </div>
            <div class="author w-100">Bill O'reily</div>
            <div class="book-price w-100">21.43</div>
        </div>
        <div class="product col-lg-2 col-md-3 col-4">
            <div class="book-cover w-100">
                <a href="book_details.html">
                    <img src="img/book120px.png" alt="Karel Gott - Umelecky a soukromy zivot kniha" class="img-fluid" width="120">
                </a>
            </div>
            <div class="book-title w-100">
                <a href="book_details.html">Karel Gott - Umelecky a soukromy zivot </a>
            </div>
            <div class="author w-100">Bill O'reily</div>
            <div class="book-price w-100">21.43</div>
        </div>
        <div class="product col-lg-2 col-md-3 col-4">
            <div class="book-cover w-100">
                <a href="book_details.html">
                    <img src="img/book120px.png" alt="Karel Gott - Umelecky a soukromy zivot kniha" class="img-fluid" width="120">
                </a>
            </div>
            <div class="book-title w-100">
                <a href="book_details.html">Karel Gott - Umelecky a soukromy zivot </a>
            </div>
            <div class="author w-100">Bill O'reily</div>
            <div class="book-price w-100">21.43</div>
        </div>
        <div class="product col-lg-2 col-md-3 col-4 ">
            <div class="book-cover w-100">
                <a href="book_details.html">
                    <img src="img/book120px.png" alt="Karel Gott - Umelecky a soukromy zivot kniha" class="img-fluid" width="120">
                </a>
            </div>
            <div class="book-title w-100">
                <a href="book_details.html">Karel Gott - Umelecky a soukromy zivot </a>
            </div>
            <div class="author w-100">Bill O'reily</div>
            <div class="book-price w-100">21.43</div>
        </div>
        <div class="product col-lg-2 col-md-3 col-4 ">
            <div class="book-cover w-100">
                <a href="book_details.html">
                    <img src="img/book120px.png" alt="Karel Gott - Umelecky a soukromy zivot kniha" class="img-fluid" width="120">
                </a>
            </div>
            <div class="book-title w-100">
                <a href="book_details.html">Karel Gott - Umelecky a soukromy zivot </a>
            </div>
            <div class="author w-100">Bill O'reily</div>
            <div class="book-price w-100">21.43</div>
        </div>

    </section>
    <section class="row my-5">
        <h2><a href="listing.html">Najnovšie</a></h2>
        <div class="product col-lg-2 col-md-3 col-4">
            <div class="book-cover w-100">
                <a href="book_details.html">
                    <img src="img/book120px.png" alt="Karel Gott - Umelecky a soukromy zivot kniha" class="img-fluid" width="120">
                </a>
            </div>
            <div class="book-title w-100">
                <a href="book_details.html">Karel Gott - Umelecky a soukromy zivot  </a>
            </div>
            <div class="author w-100">Bill O'reily</div>
            <div class="book-price w-100">21.43</div>
        </div>

        <div class="product col-lg-2 col-md-3 col-4">
            <div class="book-cover w-100">
                <a href="book_details.html">
                    <img src="img/book120px.png" alt="Karel Gott - Umelecky a soukromy zivot kniha" class="img-fluid" width="120">
                </a>
            </div>
            <div class="book-title w-100">
                <a href="book_details.html">Karel Gott - Umelecky a soukromy zivot</a>
            </div>
            <div class="author w-100">Bill O'reily</div>
            <div class="book-price w-100">21.43</div>
        </div>
        <div class="product col-lg-2 col-md-3 col-4">
            <div class="book-cover w-100">
                <a href="book_details.html">
                    <img src="img/book120px.png" alt="Karel Gott - Umelecky a soukromy zivot kniha" class="img-fluid" width="120">
                </a>
            </div>
            <div class="book-title w-100">
                <a href="book_details.html">Karel Gott - Umelecky a soukromy zivot </a>
            </div>
            <div class="author w-100">Bill O'reily</div>
            <div class="book-price w-100">21.43</div>
        </div>
        <div class="product col-lg-2 col-md-3 col-4">
            <div class="book-cover w-100">
                <a href="book_details.html">
                    <img src="img/book120px.png" alt="Karel Gott - Umelecky a soukromy zivot kniha" class="img-fluid" width="120">
                </a>
            </div>
            <div class="book-title w-100">
                <a href="book_details.html">Karel Gott - Umelecky a soukromy zivot </a>
            </div>
            <div class="author w-100">Bill O'reily</div>
            <div class="book-price w-100">21.43</div>
        </div>
        <div class="product col-lg-2 col-md-3 col-4 ">
            <div class="book-cover w-100">
                <a href="book_details.html">
                    <img src="img/book120px.png" alt="Karel Gott - Umelecky a soukromy zivot kniha" class="img-fluid" width="120">
                </a>
            </div>
            <div class="book-title w-100">
                <a href="book_details.html">Karel Gott - Umelecky a soukromy zivot </a>
            </div>
            <div class="author w-100">Bill O'reily</div>
            <div class="book-price w-100">21.43</div>
        </div>
        <div class="product col-lg-2 col-md-3 col-4 ">
            <div class="book-cover w-100">
                <a href="book_details.html">
                    <img src="img/book120px.png" alt="Karel Gott - Umelecky a soukromy zivot kniha" class="img-fluid" width="120">
                </a>
            </div>
            <div class="book-title w-100">
                <a href="book_details.html">Karel Gott - Umelecky a soukromy zivot </a>
            </div>
            <div class="author w-100">Bill O'reily</div>
            <div class="book-price w-100">21.43</div>
        </div>
    </section>


    <div class="row mb-4 justify-content-center">
        <div class="col-md-3 col-sm-5 col-10 mx-3 notice d-flex my-2 py-2 justify-content-center">
            <i class="fa fa-book fa-2x my-auto"></i>
            <span class="h5 my-auto mx-2">10 000 kníh v ponuke</span>
        </div>
        <div class="col-md-3 col-sm-5 col-10 mx-3 notice d-flex my-2 py-2 justify-content-center">
            <i class="fa fa-cubes fa-2x my-auto"></i>
            <span class="h5 my-auto mx-2">8 231 kníh na sklade</span>
        </div>
        <div class="col-md-3 col-sm-5 col-10 mx-3 notice d-flex my-2 py-2 justify-content-center">
            <i class="fa fa-truck fa-2x my-auto"></i>
            <span class="h5 my-auto mx-2">doručenie do 48 hodín</span>
        </div>


    </div>
</main>

<footer>
    <div class="row mt-5 py-3 mx-0" style="background-color: #111417">
        <div class="col-3 col-md-2">
            <a class="navbar-brand" href="#">
                <img src="./img/whitelogo3.png" alt="Logo" class="logo">
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
