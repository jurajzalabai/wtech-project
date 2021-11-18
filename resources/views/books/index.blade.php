@extends('layouts.app')

@section('css-stylesheet')
    <link href="{{asset('css/main_pages_stylesheet.css') }}" rel="stylesheet">
@endsection


@section('content')
<main class="container-md px-0">
    <div class="d-flex flex-row  my-2 py-2 px-3 rounded-pill" style="background-color:#ed8e00">
    <nav aria-label="breadcrumb">
        <ol class=" my-auto breadcrumb">
            <li class="breadcrumb-item"><a  style="color: black;" href={{route('home')}}>Domov</a></li>
            <li class="breadcrumb-item"><a  style="color: black;" href="{{route('books.index')}}">Knihy</a></li>
            @if(isset($category))
                @if($category->parentCategory)
                    <li class="breadcrumb-item"><a  style="color: black;" href="{{route('books.index', ['category'=>$category->parentCategory->id])}}">{{$category->parentCategory->name}}</a></li>
                @endif
                <li class="breadcrumb-item"><a  style="color: black;" href="{{route('books.index', ['category'=>$category->id])}}">{{$category->name}}</a></li>
            @endif
        </ol>
    </nav>
    </div>
    <div class="row mx-0">
        @include('components.side-menu')

        <section class="col px-0">
            <div class="row justify-content-between mx-1">
                <h1 class="col-auto px-0">{{$category_name}}</h1>
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

            @if(!count($books))
                <div class="h4 text-center mt-4">
                    <i>Žiadne knihy so zvolenými parametrami nie sú k dispozícii.</i>
                </div>
            @endif

            @foreach($books as $book)
                @include('components.book-product')
            @endforeach


            <nav class="my-5 d-flex justify-content-center">
                {!! $books->appends(request()->input())->links() !!}
            </nav>
        </section>
    </div>
</main>
@endsection
