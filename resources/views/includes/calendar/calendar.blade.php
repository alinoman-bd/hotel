<div class="reservation-calendar_custom">

    <div class="reservation-calendar_title">
        <span class="reservation-calendar_month">{{$calendar['header']['month']['name']}}</span>
        <span class="reservation-calendar_year">{{$calendar['header']['year']}}</span>

        @if($calendar['header']['position'] == 1)
        <a href="#" class="reservation-calendar_prev reservation-calendar_corner" onclick="calendarSwitch(window.current_date, 1)"><i class="lotus-icon-left-arrow"></i></a>
        @else
        <a href="#" class="reservation-calendar_next reservation-calendar_corner" onclick="calendarSwitch(window.next_date, 2)"><i class="lotus-icon-right-arrow"></i></a>
        @endif
    </div>
    <table class="reservation-calendar_tabel">
        <thead>
            <tr>
                <th>Su</th>
                <th>Mo</th>
                <th>Tu</th>
                <th>We</th>
                <th>Th</th>
                <th>Fr</th>
                <th>Sa</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < count($calendar['data']) / 7; $i++) <tr>
                @for ($j = (7 * $i); $j < (7 * ($i + 1)); $j++) @if ($calendar['data'][$j] !='' ) <td class="{{($calendar['data'][$j]['day'] == $calendar['today']  && $calendar['header']['month']['name'] == $calendar['header']['month']['current_month']) ? 'reservation-calendar_current-date' : ''}}" id="td_{{$calendar['header']['year']}}_{{$calendar['header']['month']['name']}}_{{$calendar['data'][$j]['day']}}">
                    <input type="hidden" class="month-identifier" value="<?= $calendar['header']['month']['name'] ?>">
                    <input type="hidden" class="index-identifier" value="<?= $j ?>">
                    <a href="javascript: void(0)" class="<?= in_array($calendar['data'][$j]['date'], $calendar['first_booking_dates']) ? 'room-full-first' : '' ?> <?= ($calendar['data'][$j]['bookings']['count'] == $room['total_rooms']) ? 'room-full-color' : '' ?> <?= Carbon\Carbon::parse($calendar['data'][$j]['date'])->lt($calendar['today_date'])? 'past_dates_calendar' : '' ?>">
                        <div class="cross">
                            <small>{{$calendar['data'][$j]['day']}}</small>
                            @if ($calendar['data'][$j]['day'] == $calendar['today'] && $calendar['header']['month']['name'] == $calendar['header']['month']['current_month'])
                            <!-- <span>Today</span> -->
                            @endif
                            <span class="room_available"><em>{{$calendar['data'][$j]['bookings']['count']}}</em> / <em>{{$room['total_rooms']}}</em></span>
                            <div class="popover-btn" data-toggle="popover" data-container="body" id="{{$calendar['header']['year']}}_{{$calendar['header']['month']['name']}}_{{$calendar['data'][$j]['day']}}" onclick="dateSelectAction(event)"></div>
                        </div>
                    </a>
                    <div id="popover_{{$calendar['header']['year']}}_{{$calendar['header']['month']['name']}}_{{$calendar['data'][$j]['day']}}" class="hide booking-popover">
                        <div class="wich-container">
                            <div class="wich-slider">
                                @if($calendar['data'][$j]['bookings']['count'])
                                @foreach($calendar['data'][$j]['bookings']['carts'] as $key => $cart)
                                <div class="wich-slider__item">
                                    {{-- <div class="slide-number">{{$key +  1}} / {{$calendar['data'][$j]['bookings']['count']}}</div> --}}
                                    <div class="booking-information">
                                        <div class="customer-name">
                                             {{$cart['room']['title']}}
                                        </div>
                                        <div class="cart-information">
                                            <div class="cart">
                                                <div class="customer-name-t">
                                                {{$cart['user']['name']}}
                                                </div>
                                                <div class="customer-phone">
                                                    <i class="fa fa-phone"></i> {{$cart['user']['phone']}}
                                                </div>
                                                <div class="order-id">
                                                    <a href="http://">{{$cart['order_id']}}</a>
                                                </div>
                                                <div class="payment-status {{$cart['order']['is_paid'] ? 'paid' : 'non-paid'}}">
                                                    {{$cart['order']['is_paid'] ? 'Paid' : 'Non Paid'}}
                                                </div>
                                            </div>
                                            <div class="room-image">
                                                <img src="{{asset($cart['room']['thumb'])}}" alt="room-image" srcset="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class="wich-slider__item">
                                    <div class="no-booking-avilable">@lang('frontend.booking.no.avilable').</div>
                                </div>
                                @endif
                            </div>
                            <input type="hidden" class="month-identifier" value="<?= $calendar['header']['month']['name'] ?>">
                            <input type="hidden" class="index-identifier" value="<?= $j ?>">
                            <div class="wich-slider__control_prev">
                                <i class="lotus-icon-left-arrow"></i>
                            </div>
                            <div class="wich-slider__control_next">
                                <i class="lotus-icon-right-arrow"></i>
                            </div>
                        </div>
                    </div>
                    </td>
                    @else
                    <td></td>
                    @endif
                    @endfor
                    </tr>
                    @endfor
        </tbody>
    </table>
</div>
<script>
    setCalendarData(<?= json_encode($calendar) ?>, "<?= $calendar['header']['month']['name'] ?>");
</script>