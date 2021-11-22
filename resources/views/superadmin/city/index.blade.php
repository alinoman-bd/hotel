@extends('superadmin.layout')
@section('title')
@endsection

@section('style')
	<link href="{{asset('super-admin/taginput.css')}}" rel="stylesheet">
	<style type="text/css">
		.rc-tbl{
			margin-top: 40px;
		}
		.pagination{
			display: inline-flex;
			margin-bottom: 20px;
			margin-top: 20px;
		}
		.r-pgi{
			background: #2c3034;
		}
		.alert-primary {
		    color: #fdfdfd;
		    background-color: #2c3034;
		    border-color: #b8daff;
		}
	</style>
@endsection
	
@section('content')
	<div class="container-fluid rc-tbl">
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-primary" role="alert">
  					All Cities 
				</div>
				<div class="all-cities">
					@include('superadmin.include.city-table')
				</div>
			</div>
		</div>
	</div>
	<div class="city-modal-area">
		<div class="modal fade" id="cityModal" tabindex="-1" role="dialog" aria-labelledby="cityModalLabel" aria-hidden="true">
		  	<div class="modal-dialog modal-lg" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<h5 class="modal-title" id="exampleModalLabel">Edit City</h5>
		        		
		      		</div>
		      		<form method="post" action="{{route('sup.city.update')}}" id="updateCity">
		      			@csrf
			      		<div class="modal-body edit-city-content">
			        		{{-- put city content --}}
			      		</div>
			      		<div class="modal-footer">
			        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        		<button type="submit" class="btn btn-primary btn-dis">
			        			Save
			        		</button>
			      		</div>
		      		</form>
		    	</div>
		  	</div>
		</div>
	</div>
@endsection
@section('script')
	<script src="{{asset('super-admin/taginput.js')}}"></script>
	<script src="{{asset('super-admin/city.js')}}"></script>
	@if(Session::has('success'))
		<script>
			toastr["success"]("{{Session::get('success')}}");
		</script>
	@endif
@endsection