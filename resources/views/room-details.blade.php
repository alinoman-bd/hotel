@extends('layouts.app')
@section('content')
@include('includes.common.bradcrum',[
'title' => $room['title'],
'description' => 'See all features for this room'
])

@section('meta')
<meta name="title" content="{{$room['images'][0]['title']}}">
<meta name="description" content="{{ implode(' ', array_slice(explode(' ', $room['description']), 0, 150))}}">
@foreach($room['images'] as $img)
<meta name="twitter:image" content="{{asset($img['image_path'])}}">
@endforeach
<meta name="keyword" content="hotel rooms, room booking,resort,best room for booking">
@endsection
<!-- ROOM DETAIL -->
<section class="section-room-detail bg-white">
	<div class="container">

		<!-- DETAIL -->
		<div class="room-detail">
			<div class="row">
				<div class="col-lg-9">
					<!-- LAGER IMGAE -->
					<div class="room-detail_img">
						<div class="room_img-item">
							<img src="{{asset($room['images'][0]['image_path'])}}" alt="">
							<h6>{{$room['images'][0]['title']}}</h6>
						</div>
						@foreach($room['images'] as $img)
						<div class="room_img-item">
							<img class="cover" src="{{asset($img['image_path'])}}" alt="">
							<h6>{{$img['title']}}</h6>
						</div>
						@endforeach
						
					</div>
					<!-- END / LAGER IMGAE -->

					<!-- THUMBNAIL IMAGE -->
					<div class="room-detail_thumbs">
						<a href="#"><img src="{{asset($room['images'][0]['image_path'])}}" alt=""></a>
						@foreach($room['images'] as $img)
						<a href="#"><img src="{{asset($img['image_path'])}}" alt=""></a>
						@endforeach
					</div>
					<!-- END / THUMBNAIL IMAGE -->
					<div class="room-detail_tab">
						<div class="row">
							<!-- CALENDAR -->
							<!-- <div class="calender"></div> -->
							<div class="col-md-6">
								<div class="room-detail_calendar-wrap row">

									<div class="col-sm-12" id="calendar_one">
										@include('includes.calendar.calendarfront')
									</div>

									<div class="calendar_status text-center col-sm-12">
										<span>Available</span>
										<span class="not-available">Not Available</span>
										<span class="today">Today</span>
									</div>
								</div> <!-- END / CALENDAR -->
							</div>
							<!-- END / CALENDAR -->
							<div class="col-md-6">

								<div class="room-detail_amenities">
									<p><?=$room['description']?></p>

									<div class="row">
										<div class="col-xs-6">
											<h6>Allowed Person : {{$room['allowed_person']}}</h6>
										</div>
										<div class="col-xs-6">
											<h6>Total Rooms : {{$room['total_rooms']}}</h6>
										</div>
									</div>

								</div>
							</div>

						</div>
					</div>
				</div>

				<div class="col-lg-3">

					<!-- FORM BOOK -->
					@include('includes.common.booking')
					<!-- END / FORM BOOK -->
					@include('includes.common.suggestion')

				</div>
			</div>
		</div>
		<!-- END / DETAIL -->

		@include('includes.common.related', ['display' => ''])

	</div>
</section>
<!-- END / SHOP DETAIL -->
@endsection
@section('setGlobalVariable1')
<script>
	setRoomData(<?= json_encode($room) ?>);
</script>
@stop