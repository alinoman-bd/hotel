<section class="section-guest-book">
    <div class="container">
        @if (count($attractions))
        @foreach($attractions as $attraction)
        <div class="guest-book" style="margin-bottom: 10px; position:relative">
            <div class="guest-book_head bg-8"
            style="background-image: url({{asset($attraction->images[0]->image_path)}});  min-height: 316px">
            <span class="edit-btn-all">
            </span>
            <div class="text" style="{{$loop->iteration % 2 == 0 ? 'float: right' : 'float: left'}}">
                <h2>{{$attraction->title}}</h2>
                <p><?= $attraction->description?></p>
            </div>
        </div>
        <a href="javascript:void(0)" data-toggle="modal" style="position: absolute; top: 10px; right:50px"
        onclick="getThisPost('attraction',<?= $attraction->id?>)" data-target="#attractions_modal"
        class="awe-btn awe-btn-13 ac-btn"><i class="fa fa-edit"></i></a>
        <a href="javascript:void(0)" style="position: absolute; top: 10px; right:10px" onclick="deleteItem('attraction',<?= $attraction->id?>)"class="awe-btn awe-btn-13 ac-btn">
            <i class="fa fa-trash"></i></a>
        </div>
    </div>
</div>
@endforeach
@else
<div class="guest-book">
    <div class="guest-book_head bg-8">
        <div class="text">
            <h2>@lang('frontend.attraction.no')</h2>
            <p class="demo demo-bg"></p>
            <button class="awe-btn" data-toggle="modal" data-target=".modal.first">@lang('backend.attraction.add')</button>
        </div>
    </div>
</div>
@endif
</div>
</section>

<script type="text/javascript">
    window.img_path = '<?= asset('')?>';
</script>