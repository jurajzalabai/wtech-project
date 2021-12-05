@extends('layouts.app')

@section('css-stylesheet')
    <link href="{{asset('css/form_stylesheet.css') }}" rel="stylesheet">
@endsection

@section('navigation')
    @include('layouts.navigation')
@endsection

@section('content')
    <main>

        <form method="POST"  action="{{route('deliveryDetails.store')}}">
            {{ csrf_field() }}
            <input type="hidden" id="shipping" name="doprava" value="{{$doprava}}">
            <input type="hidden" id="payment" name="platba" value="{{$platba}}">
        <div class="container justify-content-center pt-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <section class="delivery-details">
                @if(Session::has('message'))
                    <p class="alert alert-danger">{{ Session::get('message') }}</p>
                @endif
                <h1 class="pb-5">Dodacie údaje</h1>
                <div class="row">
                    @if($user)
                        <div class="col-12 col-md-6">
                                <label for="name">Meno a Priezvisko:</label><br>
                                <input id="name" name="name" value="{{$user->name}}" type="text" class="form-control rounded-pill form-width"><br>
                                <label for="tel-number">Telefónne číslo:</label><br>
                                <input id="tel-number" name="tel-number" value="{{$user->phone_number}}" type="text" class="form-control rounded-pill form-width"><br>
                                <label for="email">Email:</label><br>
                                <input id="email" name="email" type="text" value="{{$user->email}}" class="form-control rounded-pill form-width"><br>
                        </div>
                        <div class="col-12 col-md-6">
                                <label for="city">Mesto:</label><br>
                                <input id="city" name="city" value="{{$user->city}}" type="text" class="form-control rounded-pill form-width"><br>
                                <label for="postal_code">PSČ:</label><br>
                                <input id="postal_code" name="postal_code" value="{{$user->postal_code}}" type="text" class="form-control rounded-pill form-width"><br>
                                <label for="street">Ulica:</label><br>
                                <input id="street" name="street" type="text" value="{{$user->street}}" class="form-control rounded-pill form-width"><br>
                        </div>
                    @else
                    <div class="col-12 col-md-6">
                            <label for="name">Meno a Priezvisko:</label><br>
                            <input id="name" name="name" type="text" value="{{old('name')}}" class="form-control rounded-pill form-width"><br>
                            <label for="tel-number">Telefónne číslo:</label><br>
                            <input id="tel-number" name="tel-number" value="{{old('tel-number')}}" type="text" class="form-control rounded-pill form-width"><br>
                            <label for="email">Email:</label><br>
                            <input id="email" name="email" type="text" value="{{old('email')}}" class="form-control rounded-pill form-width"><br>
                    </div>
                    <div class="col-12 col-md-6">
                            <label for="city">Mesto:</label><br>
                            <input id="city" name="city" type="text" value="{{old('city')}}" class="form-control rounded-pill form-width"><br>
                            <label for="postal_code">PSČ:</label><br>
                            <input id="postal_code" name="postal_code" value="{{old('postal_code')}}" type="text" class="form-control rounded-pill form-width"><br>
                            <label for="street">Ulica:</label><br>
                            <input id="street" name="street" type="text" value="{{old('street')}}" class="form-control rounded-pill form-width"><br>

                    </div>
                    @endif
                </div>
                <div class="d-flex justify-content-between pb-5">
                    <!--            <div class="col-12 col-sm-7">-->
                    <button class="btn basic-button" onclick="location.href='{{ route('shippingPayment.index')}}'" type="button">
                        Späť</button><br>
                    <!--            </div>-->
                    <!--            <div class="col-12 col-sm-5">-->
                    <div class="justify-content-end">
                        <button class="btn basic-button" type="submit">
                            Dokončiť</button><br>
                    </div>
                    <!--            </div>-->
                </div>
            </section>
        </div>
        </form>
    </main>
@endsection
