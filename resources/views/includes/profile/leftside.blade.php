<div class="col-md-4 col-lg-3">

    <div class="reservation-sidebar">

        <!-- ROOM SELECT -->
        <div class="reservation-room-selected bg-gray">
            <!-- HEADING -->
            <h2 class="reservation-heading">{{auth()->user()->name}}</h2>
            <!-- END / HEADING -->

            <!-- CURRENT -->
            <div class="text" style="margin: 20px; padding-bottom: 25px">
                <p style="font-size: 20px !important; font-weight:bold !important"><i class="lotus-icon-users"></i>
                    {{auth()->user()->name}}
                    {{auth()->user()->surname}}</p>
                <p><i class="lotus-icon-phone" style="margin-right: 5px;"></i> {{auth()->user()->phone}}</p>
                <p><i class="fa fa-envelope-o" style="margin-right: 5px;"></i>{{ auth()->user()->email}}</a>
                </p>
                <p><i class="lotus-icon-location" style="margin-right: 5px;"></i>
                    {{auth()->user()->address == null ? 'No Address Available': auth()->user()->address}}</p>
            </div>
            <!-- END / ITEM -->

        </div>
        <!-- END / ROOM SELECT -->

        <!-- SIDEBAR AVAILBBILITY -->
        <div class="reservation-sidebar_availability bg-gray">

            <a href="/rooms" class="awe-btn awe-btn-13">@lang('forntend.book.new')</a>

        </div>
        <!-- END / SIDEBAR AVAILBBILITY -->

    </div>

</div>