<!-- Modal -->
<div class="modal first fade" id="social_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header text-center">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
        class="sr-only">Close</span></button>
        <h4 class="modal-title" id="exampleModalLabel">@lang('backend.modal.social.icons')</h4>
      </div>
      <div class="modal-body">
        <form id="dataModel" action="{{route('setting.admin.storeSocialUrl')}}" role="form" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="fb_url" class="control-label">@lang('backend.modal.facebook')</label>
            <input type="url" id="fb_url" name="fb_url" class="form-control">
          </div>
          <div class="form-group">
            <label for="p_url" class="control-label">@lang('backend.modal.pinterest')</label>
            <input type="url" id="p_url" name="p_url" class="form-control">
          </div>
          <div class="form-group">
            <label for="twit_ulr" class="control-label">@lang('backend.modal.twitter')</label>
            <input type="url" id="twit_ulr" name="twit_ulr" class="form-control">
          </div>
          <div class="form-group">
            <label for="google_url" class="control-label">@lang('backend.modal.google.plus')</label>
            <input type="url" id="google_url" name="google_url" class="form-control">
          </div>
          <div class="form-group">
            <label for="instra_url" class="control-label">@lang('backend.modal.instagram')</label>
            <input type="url" id="instra_url" name="instra_url" class="form-control">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" form="dataModel" class="awe-btn">@lang('backend.modal.save')</button>
      </div>
    </div>
  </div>
</div>