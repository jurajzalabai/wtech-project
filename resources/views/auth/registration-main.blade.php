@extends('layouts.app')
@section('css-stylesheet')
    <link href="{{asset('css/form_stylesheet.css') }}" rel="stylesheet">
@endsection

@section('navigation')
    @include('layouts.navigation')
@endsection

@section('content')

<main class="container justify-content-center pt-5">
    <section class="sign-in">
        <h1 class="py-3">Registrácia</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <label for="name">Meno a priezvisko:</label><br>
            <input id="name" name="name" type="text" value="{{old('name')}}" required autofocus class="form-control rounded-pill form-width"><br>

            <label for="phone_number">Telefónne číslo:</label><br>
            <input id="phone_number" name="phone_number" value="{{old('phone_number')}}" required type="tel" class="form-control rounded-pill form-width"><br>

            <label for="email">Email:</label><br>
            <input id="email" name="email" type="email" value="{{old('email')}}" required class="form-control rounded-pill form-width"><br>

            <label for="city">Mesto:</label><br>
            <input id="city" name="city" required type="text" value="{{old('city')}}" class="form-control rounded-pill form-width"><br>

            <label for="postal_code">PSČ:</label><br>
            <input id="postal_code" required name="postal_code" value="{{old('postal_code')}}" type="text" class="form-control rounded-pill form-width"><br>

            <label for="street">Ulica:</label><br>
            <input id="street" name="street" required type="text" value="{{old('street')}}" class="form-control rounded-pill form-width"><br>

            <label for="password">Heslo:</label><br>
            <input id="password" name="password" required type="password" class="form-control rounded-pill form-width"><br>

            <label for="password_confirmation">Zopakovať heslo:</label><br>
            <input id="password_confirmation" name="password_confirmation" required type="password" class="form-control rounded-pill form-width"><br>

            <div class="d-flex justify-content-center mb-5">
                <button class="btn basic-button" type="submit">
                    Registrovať</button><br>
            </div>
            <div class="row">
                <div class="col-12 col-sm-7">
                    Už máte vytvorený účet ? &emsp;
                </div>
                <div class="col-12 col-sm-5">
                    <a href="{{route('login')}}">
                        Prihláste sa
                    </a>
                </div>
            </div>
        </form>
    </section>
</main>

@endsection
