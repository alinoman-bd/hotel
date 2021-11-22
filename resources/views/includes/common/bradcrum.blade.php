@section('title', "$title")
<section class="section-sub-banner bg-9">
    <div class="transfarent"></div>
    <div class="awe-overlay"></div>
    <div class="sub-banner">
        <div class="container">
            <div class="text text-center">
                <div class="accomd-modations-header mb-2">
                    <h2>{{$title}}
                        @isset($add)
                        @if(Request::segment(3) == 'contact')
                         Add contat
                        @else
                        <button class="awe-btn" data-toggle="modal" data-target=".modal.first"
                        <?= Request::segment(3) == 'gallery'? 'onclick="setGalleryData()"' : '' ?>>ADD {{$add}}</button>
                        @endif
                        @endisset
                    </h2>
                    <img src="{{asset('images/icon-accmod.png')}}" alt="icon">
                    <p data-toggle="modal" data-target="#crop_modal">{{$description}}</p>
                </div>
            </div>
        </div>
    </div>
</section>