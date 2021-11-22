@section('meta')
@foreach($rooms as $room)
<meta name="title" content="{{$room->title}}">
<meta name="description" content="{{ implode(' ', array_slice(explode(' ', $room->description), 0, 150)) }}">
@foreach($room->images as $img)
<meta name="twitter:image" content="{{asset($img->image_path)}}">
@endforeach
<meta name="keyword" content="hotel rooms, room booking,resort,best room for booking">
@endforeach
@endsection

<section class="section-room bg-white">
    @if(session()->has('message.level'))
    <div class="alert alert-{{ session('message.level') }}">
        {!! session('message.content') !!}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container">
        <div class="room-wrap-1">
            <div class="row">
                @if (count($rooms))
                @foreach($rooms as $room)
                <div class="col-md-6">
                    <div class="room_item-1">
                        <h2><a href="{{ route('room.details', ['room' => $room->id])}}">{{$room->title}}</a></h2>
                        <div class="img">
                            @foreach ($room->images as $imag)
                            @if ($imag->is_main)
                            <a href="{{ route('room.details', ['room' => $room->id])}}"><img src="{{asset($imag->image_path)}}" alt=""></a>
                            @endif
                            @endforeach
                        </div>

                        <div class="desc" style="margin-top: 50px">
                            <!-- {!! Str::limit($room->description , 200) !!} -->
                            <ul >
                                <li>@lang('frontend.max'): {{$room->allowed_person}} @lang('frontend.room.person')</li>
                                <li>@lang('frontend.room.rooms'): {{$room->total_rooms}} @lang('frontend.total')</li>
                            </ul>
                        </div>
                        <div class="bot">
                            <span class="price">@lang('frontend.room.starting') <span class="amout">${{$room->price}}</span> /@lang('frontend.home.room.day')</span>
                            <a href="{{ route('room.details', ['room' => $room->id])}}" class="awe-btn awe-btn-13">@lang('frontend.room.view')</a>
                        </div>

                    </div>
                </div>
                @endforeach
                @else
                <div class="col-md-6">
                    <div class="room_item-1">

                        <h2><a href="#">@lang('frontend.home.room.no')</a></h2>

                        <div class="img">
                            <a href="#"><img src="{{asset('images/room/grid/img-1.jpg')}}" alt=""></a>
                        </div>

                        <div class="desc demo">
                            <p class="demo-bg"></p>
                            <ul>
                                <li class="demo-bg"></li>
                                <li class="demo-bg"></li>
                                <li class="demo-bg"></li>
                                <li class="demo-bg"></li>
                            </ul>
                        </div>
                        @if(auth()->user())
                        <div class="bot">
                            <span class="price">@lang('frontend.room.starting') <span class="amout">$XXX</span> /@lang('frontend.home.room.day')</span>
                            <button class="awe-btn" data-toggle="modal" data-target=".modal.first">@lang('backend.room.add')</button>
                        </div>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    window.img_path = "<?= asset('public/upload/room')?>"
</script>