<div class="room-detail_compare">
    <h2 class="room-compare_title">@lang('frontend.compare')</h2>

    <div class="room-compare_content">

        
        <div class="row">
            @foreach ($related as $room)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="room-compare_item">
                    <div class="img">
                        <a href="#"><img class="cover" src="{{asset($room['images'][0]['image_path'])}}" alt=""></a>
                    </div>

                    <div class="text">
                        <h2><a href="/room-details/{{$room['id']}}">{{$room['title']}}</a></h2>

                        <ul>
                            <li><i class="lotus-icon-person"></i> Max: {{$room['allowed_person']}} Person(s)</li>
                            <li><i class="lotus-icon-bed"></i> Total Rooms: {{$room['total_rooms']}}
                            <li><i class="lotus-icon-bed"></i> Price: ${{$room['price']}}</li>
                        </ul>

                        <a href="#" class="awe-btn awe-btn-default ml-0">@lang('frontend.room.view')</a>

                    </div>

                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>