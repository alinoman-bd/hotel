<section class="section-check-availability">
    <div class="container">
        <div class="check-availability">
            <div class="row">
                <div class="col-lg-3">
                    <h2>@lang('frontend.home.availability.h2')</h2>
                </div>
                <div class="col-lg-9">
                    <form id="ajax-form-search-room" action="search_step_2.php" method="post">
                        <div class="availability-form">
                            <input type="text" name="arrive" class="awe-calendar from" placeholder="@lang('frontend.home.availability.arrival')">
                            <input type="text" name="departure" class="awe-calendar to" placeholder="@lang('frontend.home.availability.departure')">

                            <select class="awe-select" name="adults">
                                <option>@lang('frontend.home.availability.adults')</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                            <select class="awe-select" name="children">
                                <option>@lang('frontend.home.availability.children')</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                            <div class="vailability-submit">
                                <button class="awe-btn awe-btn-13">@lang('frontend.home.availability.button')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>