@extends('layouts.app')

@section('css-stylesheet')
    <link href="{{asset('css/book_details_stylesheet.css') }}" rel="stylesheet">
@endsection

@section('navigation')
    @include('layouts.admin-navigation')
@endsection

@section('content')
    <main class="container-md px-0">
        <div class="row book-main-info">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="col-md-12 d-flex d-md justify-content-center pt-3">
                <img id="book-image" src="{{asset(env('IMG_PATH').$book->photo_path)}}" alt={{$book->title}}>
            </div>
            <div class="d-flex justify-content-around pb-2 pt-4">
                <form action="{{route('admin.picture')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{$book->id}}">
                    <label for="image" class="col-form-label">Pridaj fotku</label>
                    <input type="file" class="form-control-file" id="image" name="image">

                    <button id="add_picture_button" class="btn basic-button" type="submit" style="font-weight: bold">Pridať obrázok</button>
                </form>
                <form action="{{route('admin.remove-image', $book->id)}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="mt-2 btn basic-button" data-bs-toggle="modal" data-bs-target="#confirmationPopup{{$book->id}}" type="button" style="font-size: 1.7em; background-color: unset;" >
                        <i class="fa fa-trash"></i></button>

                    <div class="modal fade" id="confirmationPopup{{$book->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Potvrdenie</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Naozaj chcete vymazať tento obrázok ?
                                </div>
                                <div class="modal-footer d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nie</button>
                                    <button type="submit" class="btn btn-primary">Áno, chcem ho vymazať</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="d-flex justify-content-center mb-3">
                <form action="{{route('admin.destroy', $book->id)}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="mt-2 btn basic-button" data-bs-toggle="modal" data-bs-target="#confirmationPopup2{{$book->id}}" type="button" >
                        <i class="fa fa-trash"></i>
                        Odstrániť knihu
                    </button>

                    <div class="modal fade" id="confirmationPopup2{{$book->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Potvrdenie</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Naozaj chcete vymazať túto knihu ?
                                </div>
                                <div class="modal-footer d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nie</button>
                                    <button type="submit" class="btn btn-primary">Áno, chcem ju vymazať</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div >
        <form method="post" action="{{ route('admin.update', $book->id)}}">
            {{csrf_field()}}
            {{method_field('PUT')}}

            <input type="hidden" id="id" name="id" value="{{$book->id}}">
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
                <input id="title" name="title" required type="text" class="form-control rounded-pill form-width" value="{{$book->title}}"><br>

                <label for="author">Autor:</label><br>
                <input id="author" name="author" required type="text" class="form-control rounded-pill form-width" value="{{$book->author->name}}"><br>

                <label for="rating">Hodnotenie:</label><br>
                <input id="rating" name="rating" required type="text" class="form-control rounded-pill form-width" value="{{$book->rating}}"><br>

                <label for="price">Cena:</label><br>
                <input id="price" name="price" required type="text" class="form-control rounded-pill form-width" value="{{$book->price}}"><br>
                </div>
            </section>
        <section class="block-text mt-3">
            <h2 class="mt-4">Popis</h2>
            <div class="p-3 ">
                <label for="book_description"></label>
                <textarea id="book_description" rows="5" name="description"  class="form-control form-width">{{$book->description}}
                </textarea>
            </div>
        </section>
        <section class="block-text mt-3">
            <h2>Detaily</h2>
            <div class=" p-3 row">
                <div class="col-12 col-sm-6">
                    <label for="publish_date">Dátum vydania:</label><br>
                    <input id="publish_date" name="publish_date" required type="text" value="{{$book->publish_date}}" class="form-control rounded-pill form-width"><br>

                    <label for="binding_type">Typ väzby:</label>
                    <br>
                    @if($book->binding_type == "Pevna vazba")
                        <input type="radio" id="strong" name="binding_type" value="Pevna vazba" checked>
                        <label for="binding_type" style="font-size: 20px">Pevna</label>
                        <input type="radio" id="weak" name="binding_type" value="Makka vazba">
                        <label for="binding_type" style="font-size: 20px">Makka</label>
                    @elseif($book->binding_type == "Makka vazba")
                        <input type="radio" id="strong" name="binding_type" value="Pevna vazba">
                        <label for="binding_type" style="font-size: 20px">Pevna</label>
                        <input type="radio" id="weak" name="binding_type" value="Makka vazba" checked>
                        <label for="binding_type" style="font-size: 20px">Makka</label>
                    @endif
                    <br>
                    <br>
                    <label for="number_of_pages">Počet strán:</label><br>
                    <input id="number_of_pages" name="number_of_pages" value="{{$book->number_of_pages}}" required type="text" class="form-control rounded-pill form-width"><br>
                    <label for="category">Zvoľte kategóriu:</label><br>

                    <select name="category" id="category">
                        @foreach($main_categories as $main_category)
                            @if ($main_category->id == $book->category_id)
                                <option value="{{$main_category->name}}" selected>{{$main_category->name}}</option>
                            @else
                                <option value="{{$main_category->name}}">{{$main_category->name}}</option>
                            @endif
                        @endforeach
                        @foreach($main_categories as $main_category)
                            <optgroup label="{{$main_category->name}}">
                                @foreach($main_category->subCategories()->get() as $sub_category)
                                    @if ($sub_category->id == $book->category_id)
                                        <option value="{{$sub_category->name}}" selected>{{$sub_category->name}}</option>
                                    @else
                                        <option value="{{$sub_category->name}}">{{$sub_category->name}}</option>
                                    @endif
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="reading_time">Čas čítania:</label><br>
                    <input id="reading_time" name="reading_time" required type="text" value="{{$book->reading_time}}" class="form-control rounded-pill form-width"><br>

                    <label for="publisher">Vydavateľstvo:</label><br>
                    <input id="publisher" name="publisher" value="{{$book->publisher}}" required type="text" class="form-control rounded-pill form-width"><br>

                    <label for="category">Jazyk:</label><br>
                    <select name="language" id="language">
                        @if ($book->language == "Slovensky")
                        <option value="Slovensky" selected>Slovensky</option>
                        @else
                            <option value="Slovensky">Slovensky</option>
                        @endif
                        @if ($book->language == "Anglicky")
                            <option value="Anglicky" selected>Anglicky</option>
                        @else
                            <option value="Anglicky">Anglicky</option>
                            @endif
                        @if ($book->language == "Cesky")
                            <option value="Cesky" selected>Cesky</option>
                        @else
                            <option value="Cesky">Cesky</option>
                            @endif
                    </select>
                </div>
            </div>
        </section>
            <div class="d-flex justify-content-center mt-5">
                <button id="change_book" class="btn basic-button py-2 px-5" type="submit" style="font-weight: bold;">Zmeniť</button>
            </div>
        </form>
        <section class="mt-3">
            <h2>Recenzie</h2>
            <div class="block-text p-3" style="background-color: #e8d2b7; border-radius: 10px">

                <form action="{{route('admin.review')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="px-5 py-2 m-5">
                        <input type="hidden" id="book_id" name="book_id" value="{{$book->id}}">
                        <b>Pridaj recenziu:</b> <br>
                        <label for="review_author" class="pt-3">Autor:</label><br>
                        <input id="review_author" name="review_author" required type="text" class="form-control rounded-pill form-width"><br>

                        <label for="review_rating">Hodnotenie:</label><br>
                        <input id="review_rating" name="review_rating" required type="text" class="form-control rounded-pill form-width"><br>

                        <label for="review_description">Popis:</label><br>
                        <input id="review_description" name="review_description" required type="text" class="form-control rounded-pill form-width"><br>
                        <div  class="d-flex justify-content-center">
                            <button type="submit" class=" btn btn-primary">Pridaj recenziu</button>
                        </div>
                    </div>

                </form>
                @if((count($reviews)))
                    @foreach($reviews as $k=>$review)
                        @include('components.review-admin')
                    @endforeach
                    <div class="d-flex justify-content-center" style="background: none">
                        <button class="btn basic-button" id="show_reviews_button" onclick="change_text_button()" data-bs-toggle="collapse" data-bs-target=".review.collapse" style="font-weight: bold" type="button">Zobraziť viac</button>
                    </div>
                @else
                    <div class="d-flex justify-content-center">
                        <h3 class="mt-2 h5">Žiadne recenzie na zobrazenie</h3>
                    </div>
                @endif
            </div>
        </section>
        <script>
            function change_text_button(){
                if (document.getElementById("show_reviews_button").innerText == "Zobraziť viac") {
                    document.getElementById("show_reviews_button").innerText = "Zobraziť menej";
                }
                else{
                    document.getElementById("show_reviews_button").innerText = "Zobraziť viac";
                }
            }

        </script>
    </main>
@endsection
