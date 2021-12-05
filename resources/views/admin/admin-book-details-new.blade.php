@extends('layouts.app')

@section('css-stylesheet')
    <link href="{{asset('css/book_details_stylesheet.css') }}" rel="stylesheet">
@endsection

@section('navigation')
    @include('layouts.admin-navigation')
@endsection

@section('content')
    <main class="container-md px-0">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.store')}}" enctype="multipart/form-data">
            @csrf
        <div class="row book-main-info">
            <div class="d-flex justify-content-around py-5">
                    <label for="image" class="col-form-label">Pridaj fotku</label>
                    <input type="file" class="form-control-file" id="image" name="image" value="{{old('image')}}">
            </div>
        </div>
        <div>
            @if(Session::has('message'))
                @if (Session::get('message') == 'Nesprávne ste vložili obrázok')
                    <p class="alert alert-danger">{{ Session::get('message') }}</p>
                @else
                    <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif
            @endif

            <section  class="block-text col-12 d-block justify-content-center">
                <div class="p-4">
                <label for="title">Názov:</label><br>
                <input id="title" name="title" required type="text" value="{{old('title')}}" class="form-control rounded-pill form-width"><br>

                <label for="author">Autor:</label><br>
                <input id="author" name="author" required type="text" value="{{old('author')}}" class="form-control rounded-pill form-width"><br>

                <label for="rating">Hodnotenie:</label><br>
                <input id="rating" name="rating" required type="text" value="{{old('rating')}}" class="form-control rounded-pill form-width" ><br>

                <label for="price">Cena:</label><br>
                <input id="price" name="price" required type="text" value="{{old('price')}}" class="form-control rounded-pill form-width"><br>
                </div>
            </section>
            <section class="block-text mt-3">
                <h2 class="mt-4">Popis</h2>
                <div class="p-3 ">
                    <label for="book_description"></label>
                    <textarea id="book_description" rows="5" name="description"  class="form-control form-width">{{old('description')}}</textarea>
                </div>
            </section>
            <section class="block-text mt-3">
                <h2>Detaily</h2>
                <div class=" p-3 row">
                    <div class="col-12 col-sm-6">
                        <label for="publish_date">Dátum vydania:</label><br>
                        <input id="publish_date" name="publish_date" required type="text" value="{{old('publish_date')}}" class="form-control rounded-pill form-width"><br>

                        <label for="stock_level">Zásoby: </label><br>
                        <input id="stock_level" name="stock_level" required type="text" value="{{old('stock_level')}}" class="form-control rounded-pill form-width"><br>

                        <label for="binding_type">Typ väzby:</label>
                        <br>
                            <input type="radio" id="strong" name="binding_type" value="Pevna vazba">
                            <label for="strong" style="font-size: 20px">Pevna</label>
                            <input type="radio" id="weak" name="binding_type" value="Makka vazba">
                            <label for="weak" style="font-size: 20px">Makka</label>
                        <br>
                        <br>
                        <label for="number_of_pages">Počet strán:</label><br>
                        <input id="number_of_pages" name="number_of_pages" required type="text" value="{{old('number_of_pages')}}" class="form-control rounded-pill form-width"><br>
                    </div>
                    <div class="col-12 col-sm-6">
                        <label for="reading_time">Čas čítania:</label><br>
                        <input id="reading_time" name="reading_time" required type="text" value="{{old('reading_time')}}" class="form-control rounded-pill form-width"><br>

                        <label for="publisher">Vydavateľstvo:</label><br>
                        <input id="publisher" name="publisher"  required type="text" value="{{old('publisher')}}" class="form-control rounded-pill form-width"><br>

                        <label for="publisher">Jazyk:</label><br>
                        <select name="language" id="language">
                                <option value="Slovensky" selected>Slovensky</option>
                                <option value="Anglicky">Anglicky</option>
                                <option value="Cesky">Cesky</option>
                        </select>
                        <br><br><br>
                        <label for="category">Zvoľte kategóriu:</label><br>
                        <select name="category" id="category">
                            @foreach($main_categories as $main_category)
                                <option value="{{$main_category->name}}" selected>{{$main_category->name}}</option>
                            @endforeach
                            @foreach($main_categories as $main_category)
                                <optgroup label="{{$main_category->name}}">
                                    @foreach($main_category->subCategories()->get() as $sub_category)
                                        <option value="{{$sub_category->name}}">{{$sub_category->name}}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>
                </div>
            </section>
                <div class="d-flex justify-content-center mt-5">
                    <button id="change_book" class="btn basic-button py-2 px-5" type="submit" style="font-weight: bold">Pridať knihu</button>
                </div>
        </div>

        </form>
    </main>
@endsection
