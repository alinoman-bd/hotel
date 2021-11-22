    <input type="hidden" name="room_id" value="{{$room['id']}}">
    <input type="hidden" name="room_price" value="{{$room['price']}}">
    <div id="admin-booking-selection">
        <div class="check_availability-field">
            <label>@lang('frontend.bookingform.arrive')</label>
            <input type="text" name="arival_date" data-id="arival_date" class="awe-calendar awe-input from" required placeholder="@lang('frontend.bookingform.arrive')">
        </div>

        <div class="check_availability-field">
            <label>@lang('frontend.bookingform.depature')</label>
            <input type="text" name="depature_date" data-id="depature_date" class="awe-calendar awe-input to" required placeholder="@lang('frontend.bookingform.depature')">
        </div>

        <h6 class="check_availability_title">@lang('frontend.bookingform.rooms.guest')</h6>

        <div class="check_availability-field">
            <label>@lang('frontend.menu.rooms')</label>
            <select class="awe-select" name="number_of_room" data-id="number_of_room" value="" disabled required>
            </select>
        </div>


        <div class="check_availability-field">
            <label>@lang('frontend.home.availability.adults')</label>
            <select class="awe-select" name="number_of_adult" data-id="number_of_adult" value="" disabled required>
            </select>
        </div>

        <div class="check_availability-field">
            <label>@lang('frontend.home.availability.children')</label>
            <select class="awe-select" name="number_of_child" data-id="number_of_child" value="" disabled>
                <option value="0">@lang('frontend.bookingform.select.child')</option>
                <option value="1">1 @lang('frontend.bookingform.child')</option>
                <option value="2">2 @lang('frontend.bookingform.childs')</option>
                <option value="3">3 @lang('frontend.bookingform.childs')</option>
            </select>
        </div>
        <div id="child_age_fields">

        </div>
    </div>
    <div class="d-none alert alert-danger" style="margin-top: 15px" id="admin_booking_message">
        <p>@lang('frontend.bookingform.allow.people')</p>
    </div>
    @if(request('room'))
    <button type="submit" class="awe-btn awe-btn-13" id="book_sub_btn">@lang('frontend.bookingform.book.now')</button>
    @else
    <a class="awe-btn awe-btn-13" id="admin_booking_submit" onclick="bookingThisRoom()">@lang('frontend.bookingform.procede')</a>
    @endif