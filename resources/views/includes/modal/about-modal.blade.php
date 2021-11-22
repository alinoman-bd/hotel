<!-- Modal -->
<div class="modal first fade" id="about_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
            class="sr-only">@lang('backend.modal.close')</span></button>
        <h4 class="modal-title" id="exampleModalLabel">@lang('backend.modal.about')</h4>
      </div>
      <div class="modal-body">
        <form id="dataModel" action="{{route('setting.admin.storeAbout')}}" role="form" method="post"
          enctype="multipart/form-data">
          @csrf
          <div class="active-btn-c">
            <label for="title" class="control-label">@lang('backend.modal.active'):</label><br>
            <label class="ctm-container">
              <span class="no-txt">@lang('backend.modal.not.active')</span>
              <input type="checkbox" name="is_active" value="0" id="is_active">
              <span class="checkmark"></span>
            </label>
          </div>
          <input type="hidden" id="postId" name="post_id">
          <div class="form-group">
            <label for="title" class="control-label">@lang('backend.modal.title'):</label>
            <input type="text" id="title" name="title" class="form-control">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">@lang('backend.modal.description'):</label>
            <!-- <textarea class="form-control" id="description" name="description"></textarea> -->
            <textarea class="form-control" id="summernote" name="description"></textarea>
          </div>
          <div class="form-group">
            <label style="width: 100%;" for="title" class="control-label img-label">@lang('backend.modal.image'):</label>
            <div class="pre-img-box">
              <div class="input-f">
                <span class="image-s"><span id="main_width">570</span> X <span id="main_height">300</span> @lang('backend.modal.pixel')</span>
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