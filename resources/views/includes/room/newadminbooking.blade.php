<section class="section-check-availability">
    <div class="container">
        <div class="check-availability">
            <div class="row">
                <div class="col-lg-3">
                    <h2>@lang('backend.room.availability.type')</h2>
                </div>
                <div class="col-lg-9">
                    <form action="" method="get">
                        <div class="availability-form" style="margin-right: 20px;">
                            <select class="awe-select" name="room_type" id="room_selected" >
                                <option value="0">@lang('backend.room.select.type')</option>
                               @foreach($rooms as $room)
                                <option value="{{$room->id}}" @if($room->id == request('room_type')) selected @endif>{{$room->title}}</option>
                                @endforeach
                            </select>
                            
                            <div class="vailability-submit">
                            <a href="{{route('setting.admin.room')}}" style="margin: 0 auto" class="awe-btn awe-btn-13">@lang('backend.room.add')</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
