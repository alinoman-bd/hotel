@section('title', 'Setting - Slider')
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
<section class="section-accomd mt-100" >
    <div class="container">
        <div class="accomd-modations">
            <div class="row">
                <div class="col-md-12 p-0">
                    <div class="accomd-modations-content owl-single mt-0" id="">
                        @if (count($sliders))
                        @foreach($sliders as $slider)
                        <div class="row item-hover m-0 existingData">
                            <span class="edit-btn-all top-15 right-15">
                                <a href="javascript:void(0)" data-toggle="modal"
                                onclick="getThisPost('slider',<?=$slider->id?>)" data-target="#slide_modal"
                                class="awe-btn awe-btn-13 ac-btn">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="javascript:void(0)" onclick="deleteItem('slider',<?=$slider->id?>)"class="awe-btn awe-btn-13 ac-btn">
                                <i class="fa fa-trash"></i>
                            </a>
                        </span>
                        <img src="{{asset($slider->images[0]->image_path)}}" alt="">
                        <div class="room_item-forward">
                            <div class="mailchimp-form">
                                {{$slider->title}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="row item-hover">
                        <img src="{{asset('images/slider/img-1.jpg')}}" alt="" width="100%">
                        <div class="room_item-forward">
                            <div class="mailchimp-form" style="text-align: center;">
                                <h3>@lang('backend.slider.no.added')</h3>
                                <button class="awe-btn" data-toggle="modal" data-target=".modal.first">@lang('backend.slider.add')</button>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<script type="text/javascript">
    window.img_path = "<?= asset('')?>"
</script>