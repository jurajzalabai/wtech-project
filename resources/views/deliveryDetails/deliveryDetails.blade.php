@extends('layouts.app')

@section('css-stylesheet')
    <link href="{{asset('css/form_stylesheet.css') }}" rel="stylesheet">
@endsection


@section('content')
<div class="container justify-content-center pt-5">
    <section class="delivery-details">
        <h1 class="pb-5">Dodacie údaje</h1>
        <div class="row">
            <div class="col-12 col-md-6">
                <form action="#" method="post">
                    <label for="meno">Meno:</label><br>
                    <input id="meno" name="meno" type="text" class="form-control rounded-pill form-width"><br>
                    <label for="priezvisko">Priezvisko:</label><br>
                    <input id="priezvisko" name="priezvisko" type="text" class="form-control rounded-pill form-width"><br>
                    <label for="tel-cislo">Telefónne číslo:</label><br>
                    <input id="tel-cislo" name="tel-cislo" type="text" class="form-control rounded-pill form-width"><br>
                    <label for="email">Email:</label><br>
                    <input id="email" name="email" type="text" class="form-control rounded-pill form-width"><br>
                </form>
            </div>
            <div class="col-12 col-md-6">
                <form method="post" action="#">
                    <label for="mesto">Mesto:</label><br>
                    <input id="mesto" name="mesto" type="text" class="form-control rounded-pill form-width"><br>
                    <label for="psc">PSČ:</label><br>
                    <input id="psc" name="psc" type="text" class="form-control rounded-pill form-width"><br>
                    <label for="ulica">Ulica:</label><br>
                    <input id="ulica" name="ulica" type="text" class="form-control rounded-pill form-width"><br>

                </form>
            </div>
        </div>
        <div class="d-flex justify-content-between pb-5">
            <!--            <div class="col-12 col-sm-7">-->
            <button class="btn basic-button" onclick="location.href='payment_delivery.html'" type="button">
                Späť</button><br>
            <!--            </div>-->
            <!--            <div class="col-12 col-sm-5">-->
            <div class="justify-content-end">
                <button class="btn basic-button" onclick="location.href='shopping_cart.html'" type="button">
                    Dokončiť</button><br>
            </div>
            <!--            </div>-->
        </div>
    </section>
</div>
@endsection
