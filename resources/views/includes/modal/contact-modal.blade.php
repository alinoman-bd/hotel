<!-- Modal -->
<div class="modal first fade" id="contact_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header text-center">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
        class="sr-only">@lang('backend.modal.close')</span></button>
        <h4 class="modal-title" id="exampleModalLabel">@lang('frontend.menu.contact')</h4>
      </div>
      <div class="modal-body">
        <form id="dataModel" action="{{route('setting.admin.storeContactInfo')}}" role="form" method="post"
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
          <label for="title" class="control-label">@lang('backend.modal.contact.heading') :</label>
          <input type="text" id="contact_heading" name="contact_heading" class="form-control">
        </div>
        <div class="form-group">
          <label for="message-text" class="control-label">@lang('backend.modal.contact.text'):</label>
          <textarea class="form-control" id="contact_text" name="contact_text"></textarea>
        </div>
        <div class="form-group">
          <label for="message-text" class="control-label">@lang('backend.modal.contact.address'):</label>
          <textarea class="form-control" id="address" name="contact_address"></textarea>
        </div>
        <div class="form-group">
          <label for="message-text" class="control-label">@lang('backend.modal.contact.phone'):</label>
          <input type="text" id="contact_phone" name="contact_phone" class="form-control">
        </div>
        <div class="form-group">
          <label for="message-text" class="control-label">@lang('backend.modal.contact.mail'):</label>
          <input type="email" id="contact_mail" name="contact_mail" class="form-control">
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button type="submit" form="dataModel" class="awe-btn">@lang('backend.modal.save')</button>
    </div>
  </div>
</div>
</div>