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

                <h2 class="h3">Filtrovanie</h2>
                <form action="{{route('books.index')}}" method="get" >
                    <div class="price-filter">
                        <label for="price-min">Cena od</label>
                        <br>
                        <input type="text" name="minimal_price" id="price-min"
                            @if(isset($request['minimal_price']))
                               value={{$request['minimal_price']}}
                            @endif>
                        <br>
                        <label for="price-max">Cena do</label>
                        <br>
                        <input type="text" name="maximum_price" id="price-max"
                            @if(isset($request['maximum_price']))
                               value={{$request['maximum_price']}}
                            @endif>

                    </div>


                <div class="check-boxes">
                    <section>
                        <h3 class="h5">Jazyk</h3>
                        <div class="form-check">
                            <input type="checkbox" name="slovak-language" class="form-check-input" id="slovak-check-box"
                            @if(isset($request['slovak-language']))
                                checked
                            @endif
                            >
                            <label for="slovak-check-box" class="form-check-label">
                                Slovenský
                            </label>

                        </div>

                        <div class="form-check">
                            <input type="checkbox" name="czech-language" class="form-check-input" id="czech-check-box"
                            @if(isset($request['czech-language']))
                                checked
                            @endif>
                            <label for="czech-check-box" class="form-check-label">
                                Český
                            </label>

                        </div>

                        <div class="form-check">
                            <input type="checkbox" name="english-language" class="form-check-input" id="english-check-box"
                            @if(isset($request['english-language']))
                               checked
                            @endif>

                            <label for="english-check-box" class="form-check-label">
                                Anglický
                            </label>

                        </div>
                    </section>

                    <section>
                        <h3 class="h5">Dostupnosť</h3>
                        <div class="form-check">
                            <input type="checkbox" name="available" class="form-check-input" id="available-check-box"
                            @if(isset($request['available']))
                               checked
                            @endif>
                            <label for="available-check-box" class="form-check-label">
                                Na sklade
                            </label>

                        </div>

                        <div class="form-check">
                            <input type="checkbox" name="available-soon" class="form-check-input" id="available-soon-check-box"
                            @if(isset($request['available-soon']))
                                   checked
                            @endif>
                            <label for="available-soon-check-box" class="form-check-label">
                                Čoskoro dostupné
                            </label>

                        </div>

                        <div class="form-check">
                            <input type="checkbox" name="unavailable" class="form-check-input" id="unavailable-check-box"
                            @if(isset($request['unavailable']))
                                   checked
                            @endif>
                            <label for="unavailable-check-box" class="form-check-label">
                                Vypredané
                            </label>

                        </div>
                    </section>


                    <section>
                        <h3 class="h5">Typ väzby</h3>
                        <div class="form-check">
                            <input type="checkbox" name="hard-cover" class="form-check-input" id="hard-cover-check-box"
                            @if(isset($request['hard-cover']))
                                   checked
                            @endif>
                            <label for="hard-cover-check-box" class="form-check-label">
                                Pevná väzba
                            </label>

                        </div>

                        <div class="form-check">
                            <input type="checkbox" name="soft-cover" class="form-check-input" id="soft-cover-check-box"
                            @if(isset($request['soft-cover']))
                                checked
                            @endif>
                            <label for="soft-cover-check-box" class="form-check-label">
                                Mäkká väzba
                            </label>

                        </div>
                    </section>
                </div>
                    <button class="btn btn-orange my-2" type="submit">Filtrovať</button>
                </form>

            </section>
            <div class="col-12 text-center d-block d-md-none my-2">
                <button id="show_filters" data-bs-toggle="collapse" data-bs-target="#side-menu" type="button" class="btn btn-orange">
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
                            @switch($order_by)
                                @case('price_asc')
                                    Najlacnejšie
                                    @break
                                @case('newest')
                                    Najnovšie
                                    @break
                                @case('top_selling')
                                    Najpredávanejšie
                                    @break
                            @endswitch
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href='{{route('books.index',array_merge(request()->all(),['order_by'=>'price_asc']))}}'>Najlacnejšie</a></li>
                            <li><a class="dropdown-item" href='{{route('books.index',array_merge(request()->all(),['order_by'=>'top_selling']))}}'>Najpredávanejšie</a></li>
                            <li><a class="dropdown-item" href='{{route('books.index',array_merge(request()->all(),['order_by'=>'newest']))}}'>Najnovšie</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            @foreach($books as $book)
                @include('components.book-product')
            @endforeach


            <nav class="my-5 d-flex justify-content-center">
                {!! $books->appends(request()->input())->links() !!}
            </nav>
        </section>
    </div>
@endsection
