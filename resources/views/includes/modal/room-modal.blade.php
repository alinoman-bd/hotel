<!-- Modal -->
<div class="modal first fade" id="room_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
            class="sr-only">Close</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Rooms</h4>
      </div>
      <div class="modal-body">
        <form id="dataModel" class="roomAddForm" action="{{route('setting.admin.storeRoom')}}" role="form" method="post"
          enctype="multipart/form-data">
          @csrf
          <div class="active-btn-c">
            <label for="title" class="control-label">@lang('backend.modal.active'):</label><br>
            <label class="ctm-container">
              <span class="no-txt">@lang('backend.modal.not.active')</span>
              <input type="checkbox" name="is_active" value="0" id="is_active">
              <span class="checkmark" id="is_active_mark"></span>
            </label>
          </div>
          <input type="hidden" id="postId" name="post_id">
          <div class="form-group">
            <label for="title" class="control-label">@lang('backend.modal.title'):</label>
            <input type="text" id="title" name="title" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="title" class="control-label">@lang('frontend.price'):</label>
            <input type="text" name="price" id="price" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="title" class="control-label">@lang('frontend.booking.allowed.person'):</label>
            <input type="number" id="allowed_person" name="allowed_person" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="title" class="control-label">@lang('frontend.booking.total.rooms'):</label>
            <input type="number" id="total_rooms" name="total_rooms" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Resource</label>
            <select class="form-control" id="resource_id" name="resource_id" required>
              <option value="">Select resource</option>
              @if(count($resources) > 0) 
                @foreach ($resources as $resource)
                  <option value="{{$resource->id}}" @if($selected_resource == $resource->id) selected @endif>{{$resource->name}}</option>
                @endforeach
              @endif  
            </select>
          </div>

           <div class="form-group">
            <label for="exampleFormControlSelect1">Bed Type</label>
            <select class="form-control" id="bed_type" name="bed_type" onchange="openTotalBed()" required>
              <option value="">Select bed type</option>
              @if(count($bedTypes) > 0) 
                @foreach ($bedTypes as $type)
                  <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
              @endif  
            </select>
          </div>
          <div class="form-group bed_type_name_open">
            <label for="title" class="control-label bed_type_name"></label>
            <input type="number" id="total_bed" name="total_bed" class="form-control" required>
          </div> 

          <div class="form-group">
            <label for="message-text" class="control-label">@lang('backend.modal.description'):</label>
            <textarea class="form-control addRoomModalDes" id="summernote" name="description"></textarea>
          </div>
          <div class="form-group">
            <label style="width: 100%;" for="title"
              class="control-label img-label">@lang('backend.modal.main.image'):</label>
            <div class="pre-img-box">
              <div class="input-f">
                <span class="image-s"><span id="main_width">1080</span> X <span id="main_height">720</span>
                  @lang('backend.modal.pixel')</span>
                <input style="display: none;" class="checkValidFile" name="main_image" type="file" id="main_file">
                <label for="main_file" class="btn-3">
                  <samp><i class="fa fa-upload"></i></samp>
                  <span>@lang('backend.modal.upload.image') </span>
                </label>
              </div>
              <div class="pre-img pre-thumb"><img id="main_preview" src="#" alt="your image" class="checkImageValid"></div>
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
</div>