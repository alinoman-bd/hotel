<section class="section-contact">
    @if(session()->has('message.level'))
    <div class="alert alert-{{ session('message.level') }}">
        {!! session('message.content') !!}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container">
        <div class="contact">
            <div class="row">

                <div class="col-md-6 col-lg-5">
                    <button style="float: right;" onclick="checkContactinfo()" class="awe-btn" data-toggle="modal" data-target=".modal.first">@lang('backend.contact.update.info')</button>
                    @if($contacts)
                    <div class="text">
                        <h2>{{@$contacts->contact_heading}}</h2>
                        <p><?= @$contacts->contact_text?></p>
                        <ul>
                            <li><i class="icon lotus-icon-location"></i> {{@$contacts->contact_address}}</li>
                            <li><i class="icon lotus-icon-phone"></i> {{@$contacts->contact_phone}}</li>
                            <li><i class="icon fa fa-envelope-o"></i> {{@$contacts->contact_mail}}</li>
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


            </div>  
        </div>
    </div>
</section>
<!-- END / CONTACT