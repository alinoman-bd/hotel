
<section class="section-room bg-white">
    <div class="container">
        <div class="restaurant-lager">
            <div class="restaurant_content">
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">@lang('frontend.title')</th>
                                <th scope="col">@lang('frontend.price')</th>
                                <th scope="col">@lang('frontend.booking.allowed.person')</th>
                                <th scope="col">@lang('frontend.booking.total.rooms')</th>
                                <th scope="col">@lang('backend.booking.order.id')</th>
                                <th scope="col">@lang('backend.booking.arrival.date')</th>
                                <th scope="col">@lang('backend.booking.order.amount')</th>
                                <th scope="col">@lang('backend.booking.user.name')</th>
                                <th scope="col">@lang('backend.booking.user.phone')</th>
                                <th scope="col">@lang('backend.booking.user.address')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $n = 0 @endphp
                            @foreach($bookings as $booking)
                            <tr>
                                <th scope="row">{{++$n}}</th>
                                <td>{{$booking->room->title}}</td>
                                <td>{{$booking->room->price}}</td>
                                <td>{{$booking->room->allowed_person}}</td>
                                <td>{{$booking->room->total_rooms}}</td>
                                <td>{{$booking->order->order_id}}</td>
                                <td>{{date('d-F/Y',strtotime($booking->arival_date))}}</td>
                                <td>{{$booking->order->total_amount}}</td>
                                <td>{{$booking->user->name}}</td>
                                <td>{{$booking->user->phone}}</td>
                                <td>{{$booking->user->address}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="hr"></div>
        </div>
    </div>
</section>
