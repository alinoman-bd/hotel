<style type="text/css">
    #snackbar{
        display: none;
    }
</style>
<section class="section-room bg-white">
    <div class="container">
        <div class="restaurant-lager">
            <div class="restaurant_content">
                <div class="row">
                  <div class="col-md-12">
                    @if($messages->count())
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">@lang('frontend.name')</th>
                                <th scope="col">@lang('frontend.email')</th>
                                <th scope="col">@lang('frontend.subject')</th>
                                <th scope="col">@lang('frontend.message')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $n = 0 @endphp
                            @foreach($messages as $message)
                            <tr>
                                <th scope="row">{{++$n}}</th>
                                <td>{{$message->name}}</td>
                                <td><a href="mailto:{{$message->email}}">{{$message->email}}</a></td>
                                <td>{{$message->subject}}</td>
                                <td>{{$message->message}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    @lang('frontend.contact.no.message.user')
                    @endif
                </div>
            </div>
            <div class="hr"></div>
        </div>
    </div>
</section>
