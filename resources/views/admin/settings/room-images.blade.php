@if(count($room->images) > 0)
    @foreach ($room->images as $image)
        @if($image->is_main != 1)
            <div class="col-12 col-sm-4 col-lg-3 mulImg">
                <img src="{{asset($image->image_path)}}" class="img-fluid">
                <div class="removeImg">
                    <i class="fa fa-trash" onclick="removeRoomImg({{$room->id}},{{$image->id}})"></i>
                </div>
            </div>
        @endif
    @endforeach
@endif