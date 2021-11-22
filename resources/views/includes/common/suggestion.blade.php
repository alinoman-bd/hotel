<div class="accordion room-book ui-accordion ui-widget ui-helper-reset" role="tablist"
    id="new-room-to-select" style="margin-top: 27px;">
    <h3 class="ui-accordion-header ui-state-default ui-accordion-header-active ui-state-active ui-corner-top ui-accordion-icons"
        role="tab" id="ui-id-1" aria-controls="ui-id-2" aria-selected="true" aria-expanded="true"
        tabindex="0"><span
            class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-s"></span>@lang('frontend.room.similer.rooms')</h3>
    <div class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content-active"
        id="ui-id-2" aria-labelledby="ui-id-1" role="tabpanel" aria-hidden="false"
        style="display: block;">
        @if(count($suggestions))
        @foreach ($suggestions as $room)
        <div class="col-12" style="margin: 5px 0">
            <div class="room-compare_item">
                <div class="img">
                    <a href="#"><img class="cover"
                            src="{{asset($room['images'][0]['image_path'])}}" alt="{{$room['title']}}"></a>
                </div>
    
                <div class="text">
                    <h2><a href="/room-details/{{$room['id']}}">{{$room['title']}}</a></h2>
    
                    <ul>
                        <li><i class="lotus-icon-person"></i> Max: {{$room['allowed_person']}} Person(s)</li>
                        <li><i class="lotus-icon-bed"></i> Total Rooms: {{$room['total_rooms']}}
                        <li><i class="lotus-icon-bed"></i> Price: ${{$room['price']}}</li>
                    </ul>
    
                    <a href="/room-details/{{$room['id']}}" class="awe-btn awe-btn-default ml-0" style="float: right">@lang('frontend.room.view')</a>
    
                </div>
    
            </div>
        </div>
        @endforeach
        @else
        <div class="col-12" style="margin: 5px 0">
            <p class="alert alert-danger">@lang('frontend.room.no.suggest')</p>
        </div>
        @endif
    </div>
</div>
