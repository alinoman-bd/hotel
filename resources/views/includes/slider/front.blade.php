<section class="section-slider">
    <h1 class="element-invisible">Slider</h1>
    <div id="slider-revolution">
        <ul>
            @if (count($sliders))
            @foreach($sliders as $slider)
            <li data-transition="fade">
                <img src="{{asset($slider->images[0]->image_path)}}" data-bgposition="left center" data-duration="14000"
                    data-bgpositionend="right center" alt="">
                <div class="layer">
                </div>
                <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="center" data-y="100"
                    data-speed="700" data-start="1500" data-easing="easeOutBack"><img
                        src="{{asset('images/slider-logo.png')}}" alt="icons"></div>

                <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="center" data-y="240"
                    data-speed="700" data-start="1500" data-easing="easeOutBack">{{$slider->title_text}}</div>

                <div class="tp-caption sfb fadeout slider-caption slider-caption-sub-1" data-x="center" data-y="280"
                    data-speed="700" data-easing="easeOutBack" data-start="2000">{{$slider->title}}</div>

                <a href="{{$slider->button_link}}" class="tp-caption sfb fadeout awe-btn awe-btn-12 awe-btn-slider"
                    data-x="center" data-y="380" data-easing="easeOutBack" data-speed="700"
                    data-start="2200">{{$slider->button_text}}</a>
            </li>
            @endforeach
            @else
            <li data-transition="fade">
                <img src="{{asset('public/images/slider/img-1.jpg')}}" data-bgposition="left center"
                    data-duration="14000" data-bgpositionend="right center" alt="">
                <div class="layer">
                </div>
                <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="center" data-y="100"
                    data-speed="700" data-start="1500" data-easing="easeOutBack"><img
                        src="{{asset('images/slider-logo.png')}}" alt="icons"></div>

                <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="center" data-y="240"
                    data-speed="700" data-start="1500" data-easing="easeOutBack">title</div>

                <div class="tp-caption sfb fadeout slider-caption slider-caption-sub-1" data-x="center" data-y="280"
                    data-speed="700" data-easing="easeOutBack" data-start="2000">title text</div>

                <a href="#" class="tp-caption sfb fadeout awe-btn awe-btn-12 awe-btn-slider" data-x="center"
                    data-y="380" data-easing="easeOutBack" data-speed="700" data-start="2200">button text</a>
            </li>
            @endif
        </ul>
    </div>
</section>