@section('meta')
@foreach($abouts as $about)
<meta name="title" content="{{$about->title}}">
<meta name="description" content="{{implode(' ', array_slice(explode(' ', $about->description), 0, 150)) }}">
<meta name="twitter:image" content="{{asset($about->images[0]->image_path)}}">
<meta name="keyword" content="hotel rooms, room booking,resort,best room for booking">
@endforeach
@endsection
<section class="section-home-about">
    <div class="container">
        <div class="about">
            @if (count($abouts))
            @foreach($abouts as $about)
            <div class="about-item">
                @if($loop->iteration % 2 == 0)

                <div class="text">
                    <h2 class="heading">{{$about->title}}</h2>
                    <div class="desc">
                        <p><?= $about->description ?></p>
                    </div>
                </div>
                <div class="img owl-single">
                    <!-- <img src="{{asset($about->images[0]->image_path)}}" alt=""> -->
                    <img src="{{asset($about->images[0]->image_path)}}" alt="">
                </div>
                @else
                <div class="img owl-single">
                    <!-- <img src="{{asset($about->images[0]->image_path)}}" alt=""> -->
                    <img src="{{asset($about->images[0]->image_path)}}" alt="">
                </div>
                <div class="text">
                    <h2 class="heading">{{$about->title}}</h2>
                    <div class="desc">
                        <p><?= $about->description ?></p>
                    </div>
                </div>
                @endif
            </div>
            @endforeach
            @else
            <div class="home-about" style="margin-bottom: 10px;">
                <div class="row">
                    <div class="col-md-6">
                        <div class="img">
                            <a href="#"><img src="{{asset('images/demo/about.jpg')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text">
                            <h2 class="heading">@lang('frontend.home.about.no')</h2>
                            <span class="box-border demo"></span>
                            <p class="demo demo-bg"></p>
                        </div>
                    </div>
                </div>
            </div>

            @endif
        </div>

    </div>
</section>