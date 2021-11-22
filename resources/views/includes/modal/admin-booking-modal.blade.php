<!-- Modal -->
<div class="modal first fade" id="admin_booking_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
            class="sr-only">@lang('backend.modal.close')</span></button>
        <h4 class="modal-title" id="exampleModalLabel">lang('backend.modal.room.book.info')</h4>
      </div>
      <div class="modal-body">
        <form id="admin_user_information_form" action="" role="form" method=""
          enctype="multipart/form-data">
          <div class="form-group">
            <label for="name" class="control-label">@lang('backend.booking.user.name') *</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="@lang('backend.booking.user.name')">
          </div>
          <div class="form-group">
            <label for="surname" class="control-label">@lang('backend.booking.user.name') Sur Name *</label>
            <input type="text" id="surname" name="surname" class="form-control" placeholder="User surname">
          </div>
          <div class="form-group">
            <label for="phone" class="control-label">@lang('backend.booking.user.phone') *</label>
            <input type="text" id="phone" name="phone" class="form-control" placeholder="@lang('backend.booking.user.phone')">
          </div>
          <div class="form-group">
            <label for="email" class="control-label">@lang('backend.modal.user.email') *</label>
            <input type="text" id="email" name="email" class="form-control" placeholder="@lang('backend.modal.user.email')">
          </div>
          <div class="form-group">
            <label for="paid" class="control-label">@lang('frontend.booking.paid.amount') * </label>
            <input type="text" id="paid" name="paid" class="form-control" placeholder="@lang('frontend.booking.paid.amount')">
          </div>
          <div class="form-group">
            <label for="title" class="control-label">@lang('backend.booking.user.address') </label>
            <textarea class="form-control" name="address" id="" cols="30" rows="5" placeholder="@lang('backend.booking.user.address')"></textarea>
        </div>
          <div class="form-group">
            <label for="message-text" class="control-label">@lang('frontend.booking.li.remark') </label>
            <!-- <textarea class="form-control" id="description" name="description"></textarea> -->
            <textarea class="form-control" id="summernote" name="remark"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button form="dataModel" class="awe-btn" id="admin_user_information">@lang('frontend.bookingform.book.now')</button>
      </div>
    </div>
  </div>
</div>