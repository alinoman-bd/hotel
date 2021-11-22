<!-- Modal -->
<div class="modal second fade" id="room_image_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header text-center">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
        class="sr-only">Close</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Add Image</h4>
      </div>
      <div class="modal-body">
        <form id="addImgForm" action="{{route('room.addimage')}}" role="form" method="post"
          enctype="multipart/form-data">
          @csrf
          <input type="hidden" id="room_id_multi" name="room_id" value="">
          <div class="form-group">
            <label style="width: 100%;" for="title"
              class="control-label img-label">@lang('backend.modal.image'):</label>
            <div class="pre-img-box">
              <div class="input-f">
                <span class="image-s"><span id="alt_width">1080</span> X <span id="alt_height">720</span>
                  @lang('backend.modal.pixel')</span>
                <input style="display: none;" name="alt_image" type="file" id="alt_file" />
                <label for="alt_file" class="btn-3">
                  <samp><i class="fa fa-upload"></i></samp>
                  <span>@lang('backend.modal.upload.image') </span>
                </label>
              </div>
              <!-- <div class="pre-img pre-thumb"><img id="main_preview" src="#" alt="your image" /></div> -->
              <div class="pre-img pre-thumb"><img id="alt_preview" src="" alt="your image" /></div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" form="addImgForm" class="awe-btn">@lang('backend.modal.save')</button>
      </div>
    </div>
  </div>
</div>