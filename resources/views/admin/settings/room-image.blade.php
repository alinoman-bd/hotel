@extends('layouts.admin')
@section('content')
@include('includes.common.bradcrum',[
'title' => $room->title,
'description' => 'Add room multiple images',
])
<div class="container"> 
	<div class="row">
		<div class="panel panell panel-default">
			<div class="panel-heading"><h3 class="mb-0">Upload images</h3></div>
			<div class="panel-body">
				<form method="post" action="{{ route('setting.admin.image.upload.room') }}" enctype="multipart/form-data" id="rcMultipleImage">
					@csrf
					<input type="hidden" name="room_id" value="{{$room->id}}">
					<div class="col-md-6">
						<div class="form-group">
							<h4><label for="exampleInputFile">Choose Image</label></h4>
							<div class="upload-btn-wrapper">
								<button class="btn"><i class="fa fa-upload"></i></button>
								<input style="height: 100%;" type="file" name="file[]" id="exampleInputFile" class="roomImage" multiple />
							</div>
							{{-- <div class="container-d">
								<div class="input">
									<input name="file[]" id="file" class="roomImage" type="file" multiple>
								</div>
								
							</div> --}}
							<p class="help-block">Image type must be jpeg, png, jpg, gif, svg.</p>
						</div>
					</div> 
					<div class="col-md-6">
						<div class="form-group">
							<div style="visibility: hidden;"><h4><label for="exampleInputFile">Choose Image</label></h4></div>
							<input type="submit" name="upload" value="Upload" class="btn awe-btn btn-upload mt-0 uploadrmimage" />
						</div>
					</div>
				</form>
				<div class="col-md-12">
					<div class="progress">
						<div class="progress-bar" role="progressbar" aria-valuenow=""
						aria-valuemin="0" aria-valuemax="100" style="width: 0%">
						0%
					</div>
				</div>
				<br />
				<div style="margin-bottom: 15px;" id="success">

				</div>
			</div>

			<div class="col-md-12">
				<div class="row allAllRoomImg">
					@include('admin.settings.room-images')
				</div>
			</div>
		</div>
	</div>

</div>
</div>
@endsection