@section('meta')
@foreach($galleries as $gallery)
@foreach($gallery->images as $gl)
<meta name="title" content="{{$gl->title}}">
<meta name="twitter:image" content="{{asset($gl->image_path)}}">
<meta name="keyword" content="hotel rooms, room booking,resort,best room for booking">
@endforeach
@endforeach
@endsection


<section class="section_page-gallery bg-white">
    <div class="container">
        <div class="gallery  no-padding">
            @if ($galleries->count())
            <h2 class="heading text-center">@lang('frontend.home.gallery.h2')</h2>
            @else
            <h2 class="heading text-center" style="display: block">@lang('frontend.home.gallery.h2.no')</h2>
            @endif
            @if($galleries->count())
            <div class="gallery-cat text-center">
                <ul class="list-inline pre">
                    <li class="active"><a href="#" data-filter="*">@lang('frontend.home.gallery.all')</a></li>
                    @foreach($galleries as $gallery)
                    <li class="tb-ch"><a href="#" data-filter=".{{$gallery->id}}">{{$gallery->title}}</a></li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="gallery-content hover-img">
                <div class="row">
                    <div class="gallery-isotope col-4" style="position: relative; height: 850px;">
                        <div class="item-size"></div>
                        @if($galleries->count())
                        @foreach($galleries as $gallery)
                        @foreach($gallery->images as $gl)
                        <div class="item-isotope {{$gallery->id}}">
                            <div class="gallery_item">
                                <a href="{{asset($gl->image_path)}}" class="mfp-image">
                                    <img src="{{asset($gl->image_path)}}" alt="">
                                </a>
                                <h6 class="text">{{$gl->title}}</h6>
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                        @else
                        @for ($i = 0; $i < 4; $i++)
                        <div class="item-isotope  ground bathroom dinin" style="position: absolute; left: 50%; top: 0px;">
                            <div class="gallery_item demo demo-bg">
                                <a href="" class="mfp-image">
                                    <img src="" alt="">
                                </a>
                                <h6 class="text">Lorem Ipsum is simply dummy text of the printing</h6>
                            </div>
                        </div>
                        @endfor
                        @endif
                    </div>
                </div>
                <div class="our-gallery text-center" style="display: block; margin-bottom: 10px">
                    @if($galleries->count())
                    @if(!request()->is('gallery'))
                    <a href="/gallery" class="awe-btn awe-btn-default">@lang('frontend.home.gallery.browse')</a>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>