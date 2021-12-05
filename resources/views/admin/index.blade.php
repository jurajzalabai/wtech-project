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
                </div>

                @if(!count($books))
                    <div class="h4 text-center mt-4">
                        <i>Žiadne knihy so zvolenými parametrami nie sú k dispozícii.</i>
                    </div>
                @endif

                @foreach($books as $book)
                    @include('components.admin-book-product')
                @endforeach


                <nav class="my-5 d-flex justify-content-center d-md-flex d-none">
                    {!! $books->appends(request()->input())->links() !!}
                </nav>
                <nav class="d-md-none my-5 d-flex justify-content-center">
                    {!! $books->onEachSide(0)->appends(request()->input())->links() !!}
                </nav>
            </section>
        </div>
    </main>

@endsection
