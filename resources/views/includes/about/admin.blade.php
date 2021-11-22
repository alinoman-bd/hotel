<section class="section-about">
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

        <div class="about">
            @if(count($abouts))
            @foreach($abouts as $about)
            <div class="about-item">
                <div class="about-item item-hover">
                    <span class="edit-btn-all">
                        <a href="javascript:void(0)" data-toggle="modal" onclick="getThisPost('about',<?=$about->id?>)"
                            data-target="#about_modal" class="awe-btn awe-btn-13 ac-btn"><i class="fa fa-edit"></i></a>
                        <a href="javascript:void(0)" onclick="deleteItem('about',<?=$about->id?>)"
                            class="awe-btn awe-btn-13 ac-btn">
                            <i class="fa fa-trash"></i>
                        </a>
                    </span>
                    @if($loop->iteration % 2 == 0)
                    <div class="text">
                        <h2 class="heading">{{$about->title}}</h2>
                        <div class="desc">
                            <p><?= $about->description ?></p>
                        </div>
                    </div>
                    <div class="img owl-single">
                        <img src="{{asset($about->images[0]->image_path)}}" alt="">
                    </div>
                    @else
                    <div class="img owl-single">
                        <img src="{{asset($about->images[0]->image_path)}}" alt="">
                    </div>
                    <div class="text">
                        <h2 class="heading">{{$about->title}}</h2>
                        <div class="desc">
                            <p><?= $about->description ?></p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
            @else 
            <div class="home-about" style="margin-top: 10px">
                <div class="row">
                    <div class="col-md-6">
                        <div class="img">
                            <a href="#"><img src="{{asset('images/demo/about.jpg')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text">
                            <h2 class="heading">@lang('frontend.home.about.no')</h2>
                            <span class="box-border demo"></span>
                            <p class="demo demo-bg"></p>
                            <button class="awe-btn" data-toggle="modal" data-target=".modal.first">@lang('backend.about.add')</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
</section>


<script type="text/javascript">
    window.img_path = "<?= asset('')?>";
</script>