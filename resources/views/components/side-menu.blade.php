<div class="col-12 col-md-3 p-0 ">
    <section class="side-menu collapse show px-3 py-2" id="side-menu" aria-expanded="true">
        <h2 class="h3">Kategória</h2>
        <ul class="col-12 px-1">
            @foreach($main_categories as $main_category)
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
            @endforeach
        </ul>

        <h2 class="h3">Filtrovanie</h2>
        <form action="{{route('books.index')}}" method="get" >
            @if(isset(request()->category))
                <input type="hidden" name="category" value="{{request()->category}}">
            @endif
            @if(isset(request()->search))
                <input type="hidden" name="search" value="{{request()->search}}">
            @endif
            <div class="price-filter">
                <label for="price-min">Cena od</label>
                <br>
                <input type="number" name="minimal_price" id="price-min"
                       @if(isset($request['minimal_price']))
                       value={{$request['minimal_price']}}
                    @endif>
                <br>
                <label for="price-max">Cena do</label>
                <br>
                <input type="number" name="maximum_price" id="price-max"
                       @if(isset($request['maximum_price']))
                       value={{$request['maximum_price']}}
                    @endif>

            </div>


            <div class="check-boxes">
                <section>
                    <h3 class="h5">Jazyk</h3>
                    <div class="form-check">
                        <input type="checkbox" name="slovak-language" class="form-check-input" id="slovak-check-box"
                               @if(isset($request['slovak-language']))
                               checked
                            @endif
                        >
                        <label for="slovak-check-box" class="form-check-label">
                            Slovenský
                        </label>

                    </div>

                    <div class="form-check">
                        <input type="checkbox" name="czech-language" class="form-check-input" id="czech-check-box"
                               @if(isset($request['czech-language']))
                               checked
                            @endif>
                        <label for="czech-check-box" class="form-check-label">
                            Český
                        </label>

                    </div>

                    <div class="form-check">
                        <input type="checkbox" name="english-language" class="form-check-input" id="english-check-box"
                               @if(isset($request['english-language']))
                               checked
                            @endif>

                        <label for="english-check-box" class="form-check-label">
                            Anglický
                        </label>

                    </div>
                </section>

                <section>
                    <h3 class="h5">Typ väzby</h3>
                    <div class="form-check">
                        <input type="checkbox" name="hard-cover" class="form-check-input" id="hard-cover-check-box"
                               @if(isset($request['hard-cover']))
                               checked
                            @endif>
                        <label for="hard-cover-check-box" class="form-check-label">
                            Pevná väzba
                        </label>

                    </div>

                    <div class="form-check">
                        <input type="checkbox" name="soft-cover" class="form-check-input" id="soft-cover-check-box"
                               @if(isset($request['soft-cover']))
                               checked
                            @endif>
                        <label for="soft-cover-check-box" class="form-check-label">
                            Mäkká väzba
                        </label>

                    </div>
                </section>
            </div>
            <button class="btn btn-orange my-2" type="submit">Filtrovať</button>
        </form>

    </section>
    <div class="col-12 text-center d-block d-md-none my-2">
        <button id="show_filters" data-bs-toggle="collapse" data-bs-target="#side-menu" type="button" class="btn btn-orange">
            <i class="fa fa-filter fa-lg"></i>
            Zobraziť filtrovanie
        </button>
    </div>
</div>
