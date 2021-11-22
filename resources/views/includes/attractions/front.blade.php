@section('meta')
@foreach($attractions as $attraction)
<meta name="title" content="{{$attraction->title}}">
<meta name="description" content="{{ implode(' ', array_slice(explode(' ', $attraction->description), 0, 150))}}">
<meta name="twitter:image" content="{{asset($attraction->images[0]->image_path)}}">
<meta name="keyword" content="hotel rooms, room booking,resort,best room for booking">
@endforeach
@endsection


<section class="section-guest-book">
    <div class="container">
        @php
        $is_active = false;
        @endphp
        @if (count($attractions))
        @foreach($attractions as $attraction)
        @if($attraction->is_active)
        @php
        $is_active = true;
        @endphp
        <div class="guest-book" style="margin-bottom: 10px">
            <div class="guest-book_head bg-8"
            style="background-image: url({{asset($attraction->images[0]->image_path)}});  min-height: 316px">
            <span class="edit-btn-all">
                <a href="javascript:void(0)" data-toggle="modal"
                onclick="getThisPost('attraction',<?= $attraction->id?>)" data-target="#attractions_modal"
                class="awe-btn awe-btn-13 ac-btn"><i class="fa fa-edit"></i></a>
                <a href="javascript:void(0)" data-toggle="modal" onclick="" data-target=".modal"
                class="awe-btn awe-btn-13 ac-btn">
                <i class="fa fa-trash"></i>
            </a>
        </span>
        <div class="text" style="{{$loop->iteration % 2 == 0 ? 'float: right' : 'float: left'}}">
            <h2>{{$attraction->title}}</h2>
            <p><?= $attraction->description?></p>
        </div>
    </div>
</div>
@endif
@endforeach
@else
@if ($is_active) 
<div class="guest-book">
    <div class="guest-book_head bg-8">
        <div class="text">
            <h2>@lang('frontend.attraction.no')</h2>
            <p class="demo demo-bg"></p>
        </div>
    </div>
</div>
@endif
@endif
@if (!$is_active)
<div class="guest-book">
    <div class="guest-book_head bg-8">
        <div class="text">
            <h2>@lang('frontend.attraction.no')</h2>
            <p class="demo demo-bg"></p>
        </div>
    </div>
</div>
@endif
</div>
</section>