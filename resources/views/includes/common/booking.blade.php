<div class="room-detail_book">

    <div class="room-detail_total">
        <img src="{{asset('images/icon-logo.png')}}" alt="" class="icon-logo">
        <h6>@lang('frontend.room.starting.from')</h6>

        <p class="price">
            <span class="amout">$ {{$room['price']}}</span> /@lang('frontend.home.room.day')
        </p>
    </div>

    <form method="post" action="{{route('booking', ['room' => $room['id']])}}">
        @csrf
        <input type="hidden" id="allowed" value="{{$room['allowed_person']}}">
        <div class="room-detail_form">
            @include('includes.form.booking')
        </div>
    </form>
</div>