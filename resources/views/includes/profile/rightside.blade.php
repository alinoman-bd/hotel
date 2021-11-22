<div class="col-md-8 col-lg-9">

    <div class="reservation_content">

        <div class="tabs tabs-restaurant ui-tabs ui-widget ui-widget-content ui-corner-all">
            <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
                <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-2"
                    aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false"><a href="#tabs-2"
                        class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-2">@lang('forntend.profile.current.book')
                        <span></span></a></li>
                <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-3"
                    aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tabs-3"
                        class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-3">@lang('forntend.profile.pre.book')<span></span></a></li>
            </ul>

            @include('includes.reservation.current')

            <div id="tabs-3" aria-labelledby="ui-id-3" class="ui-tabs-panel ui-widget-content ui-corner-bottom"
                role="tabpanel" aria-hidden="true" style="display: none;">
                <div class="reservation-room_item">

                    <h2 class="reservation-room_name"><a href="#">@lang('forntend.profile.luxury.room')</a></h2>

                    <div class="reservation-room_img">
                        <a href="#"><img src="images/reservation/img-1.jpg" alt=""></a>
                    </div>

                    <div class="reservation-room_text">

                        <div class="reservation-room_desc">
                            <p>@lang('forntend.profile.luxury.details')</p>
                            <ul>
                                <li>1 @lang('forntend.reservation.king.bed')</li>
                                <li>@lang('forntend.reservation.free.wifi')</li>
                                <li>@lang('forntend.reservation.separate.area')</li>

                            </ul>
                        </div>

                        <a href="#" class="reservation-room_view-more">@lang('forntend.reservation.view.more.info')</a>

                        <div class="clear"></div>

                        <p class="reservation-room_price">
                            <span class="reservation-room_amout">$260</span> / @lang('forntend.home.room.day')
                        </p>

                        <a href="#" class="awe-btn awe-btn-default">@lang('forntend.hotel.book.room')</a>

                    </div>

                    <div class="reservation-room_package">

                        <a data-toggle="collapse" href="#reservation-room_package-1"
                            class="reservation-room_package-more collapsed" aria-expanded="false">@lang('forntend.profile.more.package')</a>

                        <div class="reservation-room_package-content collapse" id="reservation-room_package-1"
                            aria-expanded="false" style="height: 0px;">

                            <!-- ITEM PACKAGE -->
                            <div class="reservation-package_item">

                                <div class="reservation-package_img">
                                    <a href="#"><img src="images/reservation/package/img-1.jpg" alt=""></a>
                                </div>

                                <div class="reservation-package_text">

                                    <h4><a href="#">@lang('forntend.profile.package.standard')</a></h4>
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots
                                        in a piece of classical Latin literature from 45 BC, making it over 2000 years
                                        old.</p>

                                    <div class="reservation-package_book-price">
                                        <p class="reservation-package_price">
                                            <span class="amout">$260</span>
                                        </p>
                                        <a href="#" class="awe-btn awe-btn-default">@lang('forntend.profile.package.book')</a>
                                    </div>

                                </div>

                            </div>
                            <!-- END / ITEM PACKAGE -->

                            <!-- END / ITEM PACKAGE -->

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>