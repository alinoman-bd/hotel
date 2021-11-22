        <section class="section-activiti bg-white">
            <div class="container">
                <div class="activiti">

                    <div class="gallery-cat activiti-cat text-center">
                        <ul class="list-inline">
                            <li class="<?= !request('status') ? 'active' : ''?>"><a href="{{route('setting.admin.bookingList')}}">@lang('frontend.booking.li.booking')</a></li>
                            <li class="<?= request('status') == 'checkin' ? 'active' : ''?>"><a href="{{route('setting.admin.bookingList')}}?status=checkin">@lang('frontend.booking.li.checkin')</a></li>
                            <li class="<?= request('status')== 'checkout' ? 'active' : ''?>"><a href="{{route('setting.admin.bookingList')}}?status=checkout">@lang('frontend.booking.li.checkout')</a></li>
                        </ul>
                    </div>

                    <div class="activiti_content">
                        
                        <div class="row">
                        @foreach($bookings as $booking)
                            <div class="col-md-12 col-xs-12" style="border-bottom: 1px solid #e4e4e4;">
                                <div class="activiti_item">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="text" style="margin-top:0">
                                                <h2><span class="booking_number">{{$loop->iteration}}</span><a href="#">{{$booking->room->title}}</a></h2>
                                            </div>
                                            <div class="img">
                                                <a href="javascript:void()"><img src="{{asset($booking->room->thumb)}}" alt=""></a>
                                            </div>
                                            <div class="text" style="margin-top:0">
                                                <h2><a href="#">@lang('frontend.booking.li.remark')</a></h2>
                                                <p><?= $booking->remark ?></p>
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-4">
                                            <div class="text" style="margin-top:0">
                                            <h2><a href="#">@lang('frontend.booking.payment.info')</a></h2>
                                                <table class="table table-striped table-bordered">
                                                    <tbody>
                                                        <tr>
                                                        <th scope="col">@lang('frontend.booking.total.amount')</th>
                                                            <td>${{$booking->total}}</td>
                                                        </tr>
                                                        <th scope="col">@lang('frontend.booking.total.amount')</th>
                                                            <td>${{$booking->total_paid}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">@lang('frontend.booking.full.paid')</th>
                                                            <td><?= $booking->order->is_paid ? 'PAID' : 'NOT PAID'?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <h2><a href="#">@lang('frontend.booking.room.info')</a></h2>
                                                <table class="table table-striped table-bordered">
                                                    <tbody>
                                                        <tr>
                                                        <th scope="col">@lang('frontend.booking.room.type')</th>
                                                            <td>{{$booking->room->title}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">@lang('frontend.booking.allowed.person')</th>
                                                            <td>{{$booking->room->allowed_person}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">@lang('frontend.price')</th>
                                                            <td>${{$booking->room->price}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">@lang('frontend.booking.id')</th>
                                                            <td>{{$booking->order->order_id}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="text" style="margin-top:0">
                                                <h2><a href="#">@lang('frontend.booking.booking.info')</a></h2>
                                                <table class="table table-striped table-bordered">
                                                    <tbody>
                                                        <tr>
                                                        <th scope="col">@lang('frontend.usernaame')</th>
                                                            <td>{{$booking->user->name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">@lang('frontend.booking.arrive')</th>
                                                            <td>{{Carbon\Carbon::parse($booking->arival_date)->toFormattedDateString()}} 2:00 PM</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">@lang('frontend.booking.leave')</th>
                                                            <td>{{Carbon\Carbon::parse($booking->depature_date)->toFormattedDateString()}} 12:00 PM</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">@lang('frontend.booking.staying')</th>
                                                            <td>{{$booking->days}} day<?= ($booking->days > 1) ?'\'s' : '' ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">@lang('frontend.booking.booked.for')</th>
                                                            <td>{{$booking->number_of_room}} room<?= ($booking->number_of_room > 1) ?'\'s' : '' ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">@lang('frontend.home.availability.adults')</th>
                                                            <td>{{$booking->number_of_adult}} person<?= ($booking->number_of_adult > 1) ?'\'s' : '' ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">@lang('frontend.home.availability.children')</th>
                                                            <td>{{$booking->number_of_child}} kid<?= ($booking->number_of_child > 1) ?'\'s' : '' ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">@lang('frontend.booking.total.rooms')</th>
                                                            <td>{{$booking->room->total_rooms}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>

                        @if(!$bookings->count())
                        
                            <div class="alert alert-danger text-center" style="margin-top: 15px" id="admin_booking_message">
                            @if(!request('status'))
                            <p>No BOOKING available</p>
                            @else
                            <p>No <?= request('status') == 'checkin' ? 'CHECKIN' : 'CHECKOUT'?> available today</p>
                            @endif
                            </div>
                        @endif
                        {{ $bookings->links('vendor.pagination.default') }}

                    </div>

                </div>

            </div>
        </section>
        <!-- END / ACTIVITI -->
        