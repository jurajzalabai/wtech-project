<div class="review row @if($k>=2) collapse @endif">
    <div class="col-10">
        <h3 class="mt-2 h5">{{$review->username}}</h3>

        @for ($i = 1; $i <= 5; $i++)
            <i class="fa fa-star"
               @if($review->rating<$i)
               style="color:silver;"
                @endif
            ></i>
        @endfor
    </div>


    <form class="col-2 d-flex justify-content-end" action="{{route('admin.remove-review', $review->id)}}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button class="mt-2 btn basic-button" data-bs-toggle="modal" data-bs-target="#confirmationPopup{{$review->id}}" type="button" style="font-size: 1.7em; background-color: unset;">
            <i class="fa fa-trash"></i>
        </button>

        <div class="modal fade" id="confirmationPopup{{$review->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: transparent">
            <div class="modal-dialog modal-dialog-centered" style="background-color: transparent">
                <div class="modal-content" style="background-color: white">
                    <div class="modal-header" style="background-color: transparent">
                        <h5 class="modal-title">Potvrdenie</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="background-color: transparent">
                        Naozaj chcete odstrániť túto recenziu?
                    </div>
                    <div class="modal-footer d-flex justify-content-between" style="background-color: transparent">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nie</button>
                        <button type="submit" class="btn btn-primary">Áno, chcem ju vymazať</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <p id="review{{$review->id}}" class="">{{$review->review_text}}{{$review->review_text}}{{$review->review_text}}</p>
    {{--                <button class="review-button btn basic-button" type="button" style="font-weight: bold">Zobraziť viac</button>--}}
</div>
