<style type="">
.d-none{
    display: none;
}

</style>
<section class="section_page-gallery">
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
        <div class="gallery"> 
            <h1 class="element-invisible">@lang('frontend.home.gallery.h2')</h1>
            <!-- FILTER -->
            @if($galleries->count())
            <div class="gallery-cat text-center">
                <ul class="list-inline pre">
                    <li class="active" onclick="checkTab(event,0)"><a href="javascript:void(0)" data-filter="*">All</a>
                    </li>
                    @foreach($galleries as $gallery)
                    <li class="tb-ch" onclick="checkTab(event,<?=$gallery->id ?>)"><a href="#"
                        data-filter=".{{$gallery->id}}">{{$gallery->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <!-- END / FILTER -->

                <!-- GALLERY CONTENT -->
                <div class="gallery-content">
                    <div class="row">
                        <div class="gallery-isotope col-4">
                            <!-- ITEM SIZE -->
                            <div class="item-size"></div>
                            <!-- END / ITEM SIZE -->
                            <!-- ITEM -->
                            @if(@$galleries->count())
                            @foreach($galleries as $gallery)
                            @foreach($gallery->images as $gl)
                            <div class="item-isotope {{$gallery->id}}">
                                <div class="gallery_item item-hover">
                                    <span class="edit-btn-all" style="z-index: 3">
                                        <a href="#" data-toggle="modal" onclick="getThisPost('gallery',<?=$gl->id?>)"
                                            data-target="#gallery_modal" class="awe-btn awe-btn-13 ac-btn"><i
                                            class="fa fa-edit"></i></a>
                                            <a href="javascript:void(0)" onclick="deleteItem('gallery',<?=$gl->id?>)" class="awe-btn awe-btn-13 ac-btn">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </span>
                                        <a href="{{asset($gl->image_path)}}" class="mfp-image">
                                            <img src="{{asset($gl->image_path)}}" alt="">
                                        </a>
                                        <h6 class="text">{{$gl->title}}</h6>
                                    </div>
                                </div>
                                @endforeach
                                @endforeach
                                <div class="item-isotope d-none" id="addButton">
                                    <div class="">
                                        <a href="javascript:void(0)" class="dasda" onclick="setModel()"
                                        data-target=".modal.first" data-toggle="modal">
                                        <img class="add-img"
                                        src="https://icons.iconarchive.com/icons/iconsmind/outline/512/Add-icon.png"
                                        alt="">
                                    </a>
                                </div>
                            </div>
                            @else 
                            <div class="item-isotope ground bathroom suite">
                                <div class="gallery_item demo demo-bg" style=" margin-bottom: 5px;">
                                    <a href="javascript:void(0)" class="mfp-image">
                                        <img src="images/gallery/img-1.jpg" alt="">
                                    </a>
                                    <h6 class="text">@lang('backend.gallery.image.no.added')</h6>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                </div>
                <!-- GALLERY CONTENT -->

            </div>
        </div>
    </section>

    <script type="text/javascript">
        function checkTab(e,tab){
            if (tab == 0) {
                $("#addButton").addClass('d-none');
                $("#gNameVal").val(' ');
            }else{
                $("#addButton").removeClass('d-none');
                $("#addButton").addClass(`${tab}`);
                $("#gNameVal").val(tab);


            }
        }
        function setModel(){    
            $('#galleyName').hide();

        }

        function setGalleryData(){
            $('#galleyName').show();
        }

        window.img_path = "<?= asset('')?>"

    </script>