@extends('layouts.app')

@section('css-stylesheet')
    <link href="{{asset('css/form_stylesheet.css') }}" rel="stylesheet">
@endsection

@section('content')
    <form method="GET"  action="{{route('shippingPayment.create')}}">
        {{ csrf_field() }}
        <main class="row container-fluid main-container">
                <section class="col-lg-6 col-12 first-column">
                    <h1>
                        Doprava
                    </h1>
                    <p>
                        Výber spôsobu dopravy
                    </p>
                        <div class="row">
                            <div class="col-9">
                                <input type="radio" id="balikbox" name="doprava" value="balikbox">
                                <img src="./img/box.png" alt="Balíkobox" class="logo">
                                <label for="balikbox" style="font-size: 20px"><b>Balíkbox</b></label>
                            </div>
                            <div class="col-3 justify-content-end">
                                <p>1 €</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-9">
                                <input type="radio" id="zasielkovna" name="doprava" value="zasielkovna">
                                <img src="./img/box.png" alt="Zásielkovňa" class="logo">
                                <label for="zasielkovna" style="font-size: 20px"><b>Zásielkovňa</b></label>
                            </div>
                            <div class="col-3 justify-content-end">
                                <p>1 €</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-9">
                                <input type="radio" id="kurierom" name="doprava" value="kurierom">
                                <img src="./img/box.png" alt="Kuriér" class="logo">
                                <label for="kurierom" style="font-size: 20px"><b>Kuriérom</b></label>
                            </div>
                            <div class="col-3 justify-content-end">
                                <p>1 €</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-9">
                                <input type="radio" id="slovenska-posta" name="doprava" value="slovenska-posta">
                                <img src="./img/box.png" alt="Slovenská pošta" class="logo">
                                <label  for="slovenska-posta" style="font-size: 18px"><b>Slovenská pošta</b></label>
                            </div>
                            <div class="col-3 justify-content-end">
                                <p>1 €</p>
                            </div>
                        </div>
                </section>
                <section class="col-lg-6 col-12">
                    <h1>
                        Platba
                    </h1>
                    <p>
                        Výber spôsobu platby
                    </p>
                        <div class="row">
                            <div class="col-9">
                                <input type="radio" id="kreditna-karta" name="platba" value="kreditna-karta">
                                <img src="./img/card.png" alt="Kreditná karta" class="logo" style="width: 50px; height: auto" >
                                <label for="kreditna-karta" style="font-size: 20px"><b>Kreditná karta</b></label>
                            </div>
                            <div class="col-3 justify-content-end">
                                <p>1 €</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-9">
                                <input type="radio" id="prevod-na-ucet" name="platba" value="prevod-na-ucet">
                                <img src="./img/bank.png" alt="Prevod na účet" class="logo"  style="width: 50px; height: auto">
                                <label for="prevod-na-ucet" style="font-size: 20px"><b>Prevod na účet</b></label>
                            </div>
                            <div class="col-3 justify-content-end">
                                <p>1 €</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-9">
                                <input type="radio" id="na-dobierku" name="platba" value="na-dobierku">
                                <img src="./img/hand.png" alt="Na dobierku" class="logo"  style="width: 50px; height: auto">
                                <label for="na-dobierku" style="font-size: 20px"><b>Na dobierku</b></label>
                            </div>
                            <div class="col-3 justify-content-end">
                                <p>Zadarmo</p>
                            </div>
                        </div>
                </section>
            <div class="row pt-5">
                <div class="col-5 col-sm-4">
                    <button class="btn basic-button" onclick="location.href='{{ route('cart.index')}}'" type="button">
                        <i class="fa fa-shopping-cart"></i> Návrat do košíka</button>
                </div>
                <div class="col-2 col-sm-4">

                </div>
                <div class="col-5 col-sm-4 d-flex justify-content-end">
                    <button class="btn basic-button" type="submit">
                        Pokračovať</button>
                </div>
            </div>
        </main>
    </form>
@endsection


