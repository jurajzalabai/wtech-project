<header class="navbar navbar-expand-md navbar-dark sticky-md-top top-nav">
    <div class="container-lg">
        <a  href="{{ route('admin.index')}}" class="navbar-brand">
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
                    </nav>

                </div>
            </div>

            <form class="form-inline d-flex col-lg-6 col-md-8" action="{{route('admin.index')}}" method="GET">
                <input class="form-control me-2 ml-2" name="search" type="search" placeholder="Zadajte názov knihy, autora...">
                <button class="btn btn-orange" type="submit">Hľadať</button>
            </form>

            <div class="col-12 col-lg-4 col-md-2 mt-md-0 mt-3 text-center text-md-end ">
                    <div class="dropdown text-center" style=" display: inline-flex;">
                        <button class="btn-orange px-md-2 py-1 btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user fa-lg h5"></i>
                            Profil
                        </button>
                        <ul class="dropdown-menu dropdown-menu-lg-end btn-block"  aria-labelledby="dropdownMenuButton1">
                            <li style="overflow: hidden; text-overflow: ellipsis; margin-left: 10px; max-width: 200px;  height: 1.5em;"><b>{{Auth::user()->name}}</b></li>
                            <li><a href="{{ route('logout')}}" style="margin-left: 10px">Odhlásiť</a></li>
                        </ul>
                    </div>
            </div>
        </div>
    </div>
</header>
