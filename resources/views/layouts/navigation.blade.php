<header class="navbar navbar-expand-md navbar-dark sticky-md-top top-nav">
    <div class="container-lg">
        <a  href="{{ route('home')}}" class="navbar-brand">
            <img src="{{asset('img/whitelogo3.png')}}" alt="BookStore logo" class="logo">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div id="navbar-menu" class="row col justify-content-end collapse navbar-collapse ">
            <div class="p-0 dropdown col-12 col-md-2 order-last order-md-first">
                <a class=" dropdown-toggle nav-link" href="#" role="button" data-toggle="dropdown" data-bs-toggle="dropdown">Knihy</a>
                <div class="dropdown-menu books-dropdown dropdown-large">
                    <nav class="row">
                        @foreach( App\Models\Category::whereNull('parent_id')->get() as $main_category)
                            <ul class="col-12 col-sm-6 col-lg-4 ">
                                <li>
                                    <a href={{route('books.index',['category'=>$main_category->id])}} class="h5">
                                        {{$main_category->name}}
                                    </a>
                                </li>
                            @foreach($main_category->subCategories()->get() as $sub_category)
                                <li>
                                    <a href={{route('books.index',['category'=>$sub_category->id])}} >
                                        {{$sub_category->name}}
                                    </a>
                                </li>
                            @endforeach
                            </ul>
                        @endforeach
{{--                        <ul class="col-12 col-sm-6 col-lg-4 ">--}}
{{--                            <li><a href="listing.html" class="h5">Beletria</a></li>--}}
{{--                            <li><a href="listing.html">Slovenská beletria</a></li>--}}
{{--                            <li><a href="listing.html">Detektívky</a></li>--}}
{{--                            <li><a href="listing.html">Sci-fi</a></li>--}}
{{--                            <li><a href="listing.html">Historické</a></li>--}}
{{--                            <li><a href="listing.html">Klasika</a></li>--}}
{{--                            <li><a href="listing.html">Romantika</a></li>--}}
{{--                        </ul>--}}
{{--                        <ul class="col-12 col-sm-6 col-lg-4 ">--}}
{{--                            <li><a href="listing.html" class="h5">Náučná literatúra</a></li>--}}
{{--                            <li><a href="listing.html">História</a></li>--}}
{{--                            <li><a href="listing.html">Technika</a></li>--}}
{{--                            <li><a href="listing.html">Zdravie a životný štýl</a></li>--}}
{{--                            <li><a href="listing.html">Hobby</a></li>--}}
{{--                            <li><a href="listing.html">Motivačná literatúra</a></li>--}}
{{--                        </ul>--}}
{{--                        <ul class="col-12 col-sm-6 col-md-4 ">--}}
{{--                            <li><a href="listing.html" class="h5">Pre deti a mládež</a></li>--}}
{{--                            <li><a href="listing.html">Pre najmenších</a></li>--}}
{{--                            <li><a href="listing.html">Pre prvákov</a></li>--}}
{{--                            <li><a href="listing.html">Pre teenagerov</a></li>--}}
{{--                            <li><a href="listing.html">Sci-fi, fantasy</a></li>--}}
{{--                        </ul>--}}

                    </nav>

                </div>
            </div>

            <form class="form-inline d-flex col-md-6" action="{{route('books.index')}}" method="GET">
                <input class="form-control me-2 ml-2" name="search" type="search" placeholder="Zadajte názov knihy, kategóriu, autora...">
                <button class="btn btn-orange" type="submit">Hľadať</button>
            </form>
            <div class="col-12 col-md-2 mt-md-0 mt-3 text-center text-md-end ">
                @if (!Auth::check())
                <button class="btn btn-orange px-md-2 py-1" onclick="location.href='{{ route('loginak')}}'" type="button">
                    <i class="fa fa-user fa-lg h5"></i>
                    Prihlásiť
                </button>

                @else

                    <div class="dropdown text-center" style=" display: inline-flex;">
                        <button class="btn-orange px-md-2 py-1 btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user fa-lg h5"></i>
                            Profil
                        </button>
                        <ul class="dropdown-menu dropdown-menu-lg-end btn-block"  aria-labelledby="dropdownMenuButton1">
                            <li style="overflow: hidden; text-overflow: ellipsis; margin-left: 10px; max-width: 200px;  height: 1.5em;"><b>{{Auth::user()->name}}</b></li>
                            <li><a href="{{ route('logout')}}" style="margin-left: 10px">Odhlásiť</a></li>
                        </ul>

{{--                        <button class="btn-orange"  aria-labelledby="dropdownMenuButton">--}}
{{--                            <a href="{{ route('logout')}}" style="margin-left: 10px">Odhlásiť</a>--}}
{{--                        </button>--}}
                    </div>
                @endif
            </div>
            <div class="col-12 col-md-2 mt-md-0 mt-3 text-center text-md-end">
                <button class="btn btn-orange py-1 me-md-1" onclick="location.href='{{route('cart.index')}}'" type="button">
                    <i class="fa fa-shopping-cart fa-lg h5"></i>
                    Košík
                </button>
            </div>
        </div>
    </div>
</header>
