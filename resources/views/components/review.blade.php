<div class="review @if($k>=2) collapse @endif">
    <h3 class="mt-2 h5">{{$review->username}}</h3>
    @for ($i = 1; $i <= 5; $i++)
        <i class="fa fa-star"
           @if($review->rating<$i)
           style="color:silver;"
            @endif
        ></i>
    @endfor
    <p id="review{{$review->id}}" class="">{{$review->review_text}}{{$review->review_text}}{{$review->review_text}}</p>
    {{--                <button class="review-button btn basic-button" type="button" style="font-weight: bold">Zobraziť viac</button>--}}
</div>
