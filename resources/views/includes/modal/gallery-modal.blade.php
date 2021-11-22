<!-- Modal -->
<div class="modal first fade" id="gallery_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header text-center">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
        class="sr-only">Close</span></button>
        <h4 class="modal-title" id="exampleModalLabel">@lang('frontend.home.gallery.h2')</h4>
      </div>
      <div class="modal-body">
        <form id="dataModel" action="{{route('setting.admin.storeGallery')}}" role="form" method="post"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="postId" name="post_id">
        <input type="hidden" value="" id="gNameVal" name="g_name_val">
        <div class="form-group" id="galleyName">
          <label for="title" class="control-label">@lang('backend.modal.gallery.name')</label>
          <input type="text" name="gallery_name" class="form-control">
        </div>
        <div class="form-group">
          <label for="title" class="control-label">@lang('backend.modal.image.title'):</label>
          <input type="text" id="title" name="image_title" class="form-control">
        </div>
        <div class="form-group">
          <label style="width: 100%;" for="title" class="control-label img-label">@lang('backend.modal.image'):</label>
          <div class="pre-img-box">
            <div class="input-f">
              <span class="image-s"><span id="main_width">1080</span> X <span id="main_height">720</span>
            @lang('backend.modal.pixel')</span>
            <input style="display: none;" name="main_image" type="file" id="main_file" />
            <label for="main_file" class="btn-3">
              <samp><i class="fa fa-upload"></i></samp>
              <span>@lang('backend.modal.upload.image') </span>
            </label>
          </div>
          <div class="pre-img pre-thumb"><img id="main_preview" src="#" alt="your image" /></div>
        </div>
      </div>
    </form>
  </div>
  <div class="modal-footer">
    <button type="submit" form="dataModel" class="awe-btn">@lang('backend.modal.save')</button>
  </div>
</div>
</div>
</div>