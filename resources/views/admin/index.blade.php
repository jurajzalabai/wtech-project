@extends('layouts.app')

@section('css-stylesheet')
    <link href="{{asset('css/main_pages_stylesheet.css') }}" rel="stylesheet">
@endsection

@section('navigation')
    @include('layouts.admin-navigation')
@endsection

@section('content')
    <main class="container-md px-0">
        <div class="row mx-0">

            <section class="col px-0">
                <div class="row justify-content-between mx-1">
                    <h1 class="col-auto px-0">{{$category_name}}</h1>
                    <div class="col-auto my-auto d-flex px-0">
                        <button type="submit" class="btn btn-orange mt-auto" onclick="location.href='{{route('admin.create')}}'">
                                Pridať knihu
                        </button>
                    </div>
{{--                    <div class="col-auto my-auto d-flex px-0">--}}
{{--                        <div class="dropdown">--}}
{{--                            <button class="btn btn-orange dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                @switch($order_by)--}}
{{--                                    @case('price_asc')--}}
{{--                                    Najlacnejšie--}}
{{--                                    @break--}}
{{--                                    @case('newest')--}}
{{--                                    Najnovšie--}}
{{--                                    @break--}}
{{--                                    @case('top_selling')--}}
{{--                                    Najpredávanejšie--}}
{{--                                    @break--}}
{{--                                @endswitch--}}
{{--                            </button>--}}
{{--                            <ul class="dropdown-menu dropdown-menu-end">--}}
{{--                                <li><a class="dropdown-item" href='{{route('admin.index',array_merge(request()->all(),['order_by'=>'price_asc']))}}'>Najlacnejšie</a></li>--}}
{{--                                <li><a class="dropdown-item" href='{{route('admin.index',array_merge(request()->all(),['order_by'=>'top_selling']))}}'>Najpredávanejšie</a></li>--}}
{{--                                <li><a class="dropdown-item" href='{{route('admin.index',array_merge(request()->all(),['order_by'=>'newest']))}}'>Najnovšie</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>

                @if(!count($books))
                    <div class="h4 text-center mt-4">
                        <i>Žiadne knihy so zvolenými parametrami nie sú k dispozícii.</i>
                    </div>
                @endif

                @foreach($books as $book)
                    @include('components.admin-book-product')
                @endforeach


                <nav class="my-5 d-flex justify-content-center">
                    {!! $books->appends(request()->input())->links() !!}
                </nav>
            </section>
        </div>
    </main>

@endsection
