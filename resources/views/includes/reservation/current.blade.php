@php
$current = $data['current'];
// dd($current)
@endphp

<div id="tabs-2" aria-labelledby="ui-id-2" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel"
aria-hidden="true" style="display: none;">
@foreach ($current as $item)
    <div class="reservation-room_item">

        <h2 class="reservation-room_name"><a href="#">{{$item['room']['title']}}</a></h2>

        <div class="reservation-room_img">
            <a href="#"><img src="{{asset($item['room']['thumb'])}}" alt=""></a>
        </div>

        <div class="reservation-room_text">

            <div class="reservation-room_desc" style="height: 115px;overflow-y: scroll;">
                {!!$item['room']['description'] !!}
                <ul>
                    <li>{{$item['room']['allowed_person']}} @lang('forntend.reservation.king.bed')</li>
                    <li>@lang('forntend.reservation.free.wifi')</li>
                    <li>@lang('forntend.reservation.separate.area')</li>

                </ul>
            </div>

            <a href="#" class="reservation-room_view-more">@lang('forntend.reservation.view.more.info')</a>

            <div class="clear"></div>

            <p class="reservation-room_price">
                <span class="reservation-room_amout">${{$item['price']}}</span> /@lang('forntend.home.room.day')
            </p>

        </div>

        <div class="reservation-room_package">

            <a data-toggle="collapse" href="#reservation-room_package-1" class="reservation-room_package-more collapsed"
                aria-expanded="false">@lang('forntend.reservation.order.pay.info')</a>

            <div class="reservation-room_package-content collapse" id="reservation-room_package-1" aria-expanded="false"
                style="height: 0px;">
                <div class="reservation-package_item">
                    <div class="row">
                        <h3 class="shortcode-heading">@lang('forntend.reservation.order.info')</h3>
                        <div class="col-md-6">
                            <ul>
                                <li>@lang('forntend.menu.room') : <b>{{$item['number_of_room']}}</b></li>
                                <li>@lang('forntend.home.room.day') : <b>{{$item['days']}}</b></li>
                                <li>@lang('forntend.home.availability.adults') : <b>{{$item['number_of_adult']}}</b></li>
                                <li>@lang('forntend.bookingform.child') : <b>{{$item['number_of_child']}}</b></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul>
                                <li>@lang('forntend.reservation.order.id') : <b>{{$item['order']['order_id']}}</b></li>
                                <li>@lang('forntend.booking.total.amount') : <b>${{$item['order']['total_amount']}}</b></li>
                                <li>@lang('forntend.reservation.paid') : <b>{{$item['order']['is_paid']? "PAID" : "NOT PAID "}} </b></li>
                                <li>@lang('forntend.reservation.order.date') :
                                    <b>{{ \Carbon\Carbon::parse($item['order']['created_at'])->format('d/m/Y')}}</b>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="reservation-package_item">
                    <div class="row">
                        <h3 class="shortcode-heading">@lang('forntend.reservation.king.bed')PAYMENT INFORMATION</h3>
                        @foreach ($item['payments'] as $payment)
                        <div class="col-md-6">
                            <ul>
                                <li>@lang('forntend.reservation.order.id') : <b>{{$payment['order_id']}}</b></li>
                                <li>@lang('forntend.reservation.amount') : <b>${{$payment['amount']}}</b></li>
                                <li>@lang('forntend.reservation.payment.type') : <b>{{$payment['payment_type']}}</b></li>
                                <li>@lang('forntend.reservation.invoice') : <b>{{$payment['invoice_id']}} </b></li>
                                <li>@lang('forntend.reservation.paying.date') :
                                    <b>{{ \Carbon\Carbon::parse($payment['created_at'])->format('d/m/Y')}}</b>
                                </li>
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

    </div>
    @endforeach
</div>