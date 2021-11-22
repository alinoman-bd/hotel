@extends('layouts.admin')
@section('content')
<div class="dashbord">
	<div class="container">
		<div class="reservation_content bg-gray">
			@include('includes.room.newadminbooking')
			@include('includes.common.calendar')
		</div>
	</div>
</div>
@endsection
@section('setGlobalVariable')
<script>
	setRoomData(<?= json_encode($room) ?>);
	setBookedData(<?= json_encode($booked) ?>);
</script>
@endsection