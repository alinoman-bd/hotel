<section class="section-accomd awe-parallax bg-14">
    <div class="container">
        <div class="accomd-modations">
            <div class="row">
                <div class="col-md-12">
                    <div class="accomd-modations-header">
                        <h2 class="heading">@lang('frontend.home.room.h2')</h2>
                        <img src="{{asset('images/icon-accmod.png')}}" alt="icon">
                        <p>@lang('frontend.home.room.p')</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="accomd-modations-content">
                        <div class="row">
                            @if (count($rooms))
                            @foreach($rooms as $room)
                            <div class="col-xs-4">
                                <div class="accomd-modations-room">
                                    <div class="img">
                                        <a href="{{ route('room.details', ['room' => $room->id])}}">
                                            @foreach ($room->images as $img)
                                            @if ($img->is_main)
                                            <img src="{{asset($img->image_path)}}" alt="">
                                            @endif
                                            @endforeach
                                        </a>
                                    </div>
                                    <div class="text">
                                        <h2><a
                                                href="{{ route('room.details', ['room' => $room->id])}}">{{$room->title}}</a>
                                        </h2>
                                        <p class="price">
                                            <span class="amout">${{$room->price}}</span>/@lang('frontend.home.room.day')
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="col-xs-4">
                                <div class="accomd-modations-room">
                                    <div class="img">
                                        <a href="#"><img src="images/room/img-1.jpg" alt=""></a>
                                    </div>
                                    <div class="text"> 
                                        <h2><a href="#">@lang('frontend.home.room.no')</a></h2>
                                        <p class="price">
                                            <span class="amout">$xxx</span>/@lang('frontend.home.room.day')
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>