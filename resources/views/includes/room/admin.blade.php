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
                    <div class="room_item-1 item-hover">
                        <span class="edit-btn-all">
                            
                        <a href="javascript:void(0)" data-toggle="modal"
                        onclick="getThisPost('room',<?=$room->id?>)" data-target="#room_modal"
                        class="awe-btn awe-btn-13 ac-btn">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="javascript:void(0)" onclick="deleteItem('room',<?=$room->id?>)" class="awe-btn awe-btn-13 ac-btn">
                        <i class="fa fa-trash"></i>
                    </a>
                </span>
                <h2><a href="{{ route('room.details', ['room' => $room->id])}}">{{$room->title}}</a></h2>
                <div class="img">
                    @foreach($room->images as $img)
                    @if($img->is_main)
                    <a href="{{ route('room.details', ['room' => $room->id])}}"><img src="{{asset($img->image_path)}}" alt=""></a>
                    @endif
                    @endforeach
                </div>
                <div class="alt-img-box" style="width: 100%">
                    @foreach($room->images as $img)
                    <img src="{{asset($img->image_path)}}" alt="alt image">
                    @endforeach
                </div>
                <div class="desc">
                    {!! $room->description !!} 
                    <ul>
                        <li>Allowed people: {{$room->allowed_person}} @lang('frontend.room.person')</li>
                        <li>Total Rooms: {{$room->total_rooms}}</li>
                        <li>Bed Type: {{$room->bedType->name}}</li>
                        <li>Total Bed: {{$room->total_bed}}</li>
                        <li>Status: @if($room->is_active == 0) Active @else Deactive @endif</li>
                    </ul>
                </div>
                <div class="bot">
                    <span class="price">">@lang('frontend.room.starting') <span class="amout">${{$room->price}}</span> /@lang('frontend.home.room.day')</span>
                    <a href="{{route('setting.admin.image.upload',['room_id'=>$room->id])}}" class="awe-btn" >Add aditional images</a>
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

                <div class="bot">
                    <span class="price">@lang('frontend.room.starting') <span class="amout">$XXX</span> /@lang('frontend.home.room.day')</span>
                    <button class="awe-btn" data-toggle="modal" data-target=".modal.first">@lang('backend.room.add')</button>
                </div>

            </div>
        </div>
        @endif
    </div>
</div>
</div>
</section>

<script type="text/javascript">
    window.img_path = "<?= asset('')?>";
</script>