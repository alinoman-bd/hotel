-<section class="section-reservation-page bg-white">

    <div class="container">
        <div class="reservation-page">

            <div class="row m-0">
                @if($room)
                <div class="col-md-4 col-lg-3 p-0">

                    <div class="reservation-sidebar">

                        <!-- SIDEBAR AVAILBBILITY -->
                        <div class="reservation-sidebar_availability bg-gray">

                            <!-- HEADING -->
                            <h2 class="reservation-heading">@lang('frontend.your.reservation')</h2>
                            <!-- END / HEADING -->

                            <h6 class="check_availability_title">@lang('frontend.your.stay.date')</h6>
                            <form id="admin_booking_form">

                                @include('includes.form.booking')
                            </form>
                            <!-- END / SIDEBAR AVAILBBILITY -->

                        </div>

                    </div>
                </div>
                @endif
                <div class="col-md-8 col-lg-9">
                    <div class="reservation_content bg-gray">
                        @if($room)
                        <h2 class="reservation-heading">{{$room['title']}} @lang('frontend.availability')</h2>
                        <div class="row m-0">
                            <div class="col-sm-6" id="calendar_one">
                            </div>
                            <div class="col-sm-6" id="calendar_two">
                            </div>
                            @if(!$room)
                            <p style="text-align: center">
                                <a href="{{route('setting.admin.room')}}" style="margin: 0 auto" class="awe-btn awe-btn-13">@lang('backend.room.add')</a>
                            </p>
                            @endif
                        </div>
                        @else
                        <h2 class="reservation-heading">@lang('frontend.home.room.no')</h2>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@include('includes.modal.admin-booking-modal')