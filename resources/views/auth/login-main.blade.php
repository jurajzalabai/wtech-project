@extends('layouts.app')
@section('css-stylesheet')
    <link href="{{asset('css/form_stylesheet.css') }}" rel="stylesheet">
@endsection

@section('content')
<main class=" container justify-content-center pt-5">
    <section class="sign-in">
        <h1 class="py-3">Prihlásenie</h1>
        <form method="POST" action="{{ route('login') }}">
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
            <label for="email">Email:</label><br>
            <input id="email" name="email" value="{{old('email')}}" required autofocus type="email" class="form-control rounded-pill form-width"><br>

            <label for="password">Heslo:</label><br>
            <input  id="password" name="password"  type="password"  required class="form-control rounded-pill form-width"><br>

            <div class="d-flex justify-content-center mb-5">
                <button class="btn basic-button" type="submit">
                    Prihlásiť</button><br>
            </div>
            <div class="d-flex justify-content-center">
                Nemáte účet ? &emsp;&emsp;
                <a href="{{route('register')}}">
                    Zaregistrujte sa
                </a>
            </div>
        </form>
    </section>
</main>
@endsection
