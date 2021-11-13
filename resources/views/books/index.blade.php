@extends('layouts.app')

@section('css-stylesheet')
    <link href="{{asset('css/main_pages_stylesheet.css') }}" rel="stylesheet">
@endsection


@section('content')
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
                @include('components.book-product')
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
@endsection
