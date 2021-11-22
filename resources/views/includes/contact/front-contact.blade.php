@section('meta')
<meta name="title" content="{{@$contacts->contact_heading}}">
<meta name="description" content="{{ implode(' ', array_slice(explode(' ', @$contacts->contact_text), 0, 150)) }}">
<meta name="keyword" content="hotel rooms, room booking,resort,best room for booking">
@endsection

<!-- CONTACT -->
<section class="section-contact">
    <div class="container">
        <div class="contact">
            <div class="row">

                <div class="col-md-6 col-lg-5">
                    @if ($contacts)
                    <div class="text">
                        <h2>{{$contacts->contact_heading}}</h2>
                        <p><?= $contacts->contact_text?></p>
                        <ul>
                            <li><i class="icon lotus-icon-location"></i> {{$contacts->contact_address}}</li>
                            <li><i class="icon lotus-icon-phone"></i> {{$contacts->contact_phone}}</li>
                            <li><i class="icon fa fa-envelope-o"></i> {{$contacts->contact_mail}}</li>
                        </ul>
                    </div>
                    @else
                    <div class="text" class="demo-text">
                        <h2>@lang('backend.contact.no.address')</h2>
                        <p class="demo-bg">@lang('backend.contact.need.text')</p>
                        <ul>
                            <li class="demo-bg" style="margin: 5px 0"><i class="icon lotus-icon-phone"></i> </li>
                            <li class="demo-bg" style="margin: 5px 0"><i class="icon lotus-icon-location"></i> </li>
                            <li class="demo-bg" style="margin: 5px 0"><i class="icon fa fa-envelope-o"></i> </li>
                        </ul>
                    </div>
                    @endif
                    <div class="contact-location">
                        <a class="btn-collapse" data-toggle="collapse" href="#location">@lang('backend.contact.other.loc') <span class="fa fa-angle-down"></span></a>
                        <div class="collapse" id="location">
                            <div class="location-group">
                                <h6>@lang('backend.contact.no.other.loc')</h6>
                                <span>@lang('backend.contact.notify')</span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-6 col-lg-6 col-lg-offset-1">
                    <div class="contact-form">
                        <form id="send-contact-form" action="{{route('submitContactForm')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" class="field-text"  name="name" placeholder="@lang('frontend.name')">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="field-text" name="email" placeholder="@lang('frontend.email')">
                                </div>
                                <div class="col-sm-12">
                                    <input type="text" class="field-text" name="subject" placeholder="@lang('frontend.subject')">
                                </div>
                                <div class="col-sm-12">
                                    <textarea cols="30" rows="10" name="message"  class="field-textarea" placeholder="@lang('frontend.contact.write.want')"></textarea>
                                </div>
                                <div class="col-sm-6">
                                    <button type="submit" class="awe-btn awe-btn-13">@lang('frontend.send')</button>
                                </div>
                            </div>
                            <div id="contact-content"></div>
                        </form>
                    </div>
                </div>

            </div>  
        </div>
    </div>
</section>
        <!-- END / CONTACT -->