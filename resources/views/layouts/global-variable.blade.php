@php
function get_local_time(){
  
  $ip = file_get_contents("http://ipecho.net/plain");
  $url = 'http://ip-api.com/json/'.$ip;
  $tz = file_get_contents($url);
  $tz = json_decode($tz,true)['timezone'];

  return $tz;
}
$current_date = Carbon\Carbon::now()->timezone(get_local_time());
$current_month = $current_date->copy()->localeMonth;
$current_year = $current_date->copy()->year;
$next_date = $current_date->copy()->addMonth();
$next_month = $next_date->copy()->localeMonth;
$next_year = $next_date->copy()->year;
@endphp


<script>
	$.ajaxSetup({
		headers: {
			"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
		},
	});
	window.cropper_tmp_img = "<?= route('cropper.temp')?>";
	window.get_this_post = "<?=  route('setting.admin.getPostInfo' )?>";
	window.check_contact_info = "<?=  route('setting.admin.checkContact' )?>";
	window.get_current_calendar = "<?=  route('setting.admin.getCurrentCalendar' )?>";
	window.get_calendar_date = "<?=  route('setting.admin.getCalendarDate' )?>";
	window.admin_room_booking = "<?=  route('admin.room.booking' )?>";
	window.current_year = "<?= $current_year ?>";
	window.current_month = "<?= $current_month ?>";
	window.next_year = "<?= $next_year ?>";
	window.next_month = "<?= $next_month ?>";
	window.current_date = "<?= $current_date ?>";
	window.next_date = "<?= $next_date ?>";
	window.calendar = {};
	window.calendarType = {};
	window.room = {};
	window.bookingForm = {};
	window.booked = [];
	window.delete_this_item = "<?=  route('setting.admin.deleteItem' )?>";
	window.room_img_delete = "<?=  route('setting.admin.image.delete' )?>";
	
	window.upload_room_multi_image = "<?=  route('setting.admin.image.upload.room' )?>"; 
	function setCalendarData(data, month, type=true) {
		window.calendar[month] = data;
		window.calendarType = type;
	}

	function setRoomData(data) {
		window.room = data;
	}
	function setBookedData(data) {
		window.booked = data;
	}
</script>