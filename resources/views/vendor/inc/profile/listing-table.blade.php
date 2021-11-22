<div class="listing-section">
	<div class="ds-boar-title">
		<h2>Listings</h2>
		<p>All the Lorem Ipsum generators on the All the Lorem Ipsum generators on the</p>
	</div>
	<div class="db-list-com tz-db-table">
		@if(count($data['resources']) >0 )
			<table class="table">
				<thead>
					<tr>
						<th>Listing Name</th>
						<th>Date</th>
						<th>Status</th>
						<th>Edit</th>
						<th>Delete</th>
						<th>Preview</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($data['resources'] as $resource)
						@php
							$rcName = Helper::resourceName( $resource->name );
						@endphp
						<tr>
							<td>
								<img src="{{asset('vendor/img/hospital-02.jpg')}}" alt="img" style="width: 40px; height="40px;">
							</td>
							<td>{{ $resource->name }}</td>
							<td>
								@if($resource->is_active == 1)
									<span class="db-list-status" onclick="changeStatus('0',{{$resource->id}})">Active</span>
								@else 
									<span class="db-list-status-na" onclick="changeStatus('1',{{$resource->id}})">Inactive</span>
								@endif	
								
								
							</td>
							<td><a href="{{route('resource.edit', ['id' => $resource->id])}}" class="db-list-edit edit-i"><i class="fas fa-edit"></i></a></td>
							<td><a href="javascript:;" class="db-list-edit delete-i" onclick="deleteResource({{$resource->id}},{{$resource->user_id}})"><i class="fas fa-trash-alt"></i></a></td>
							<td>
								<a href="{{route('vendors.all',['p1'=>$resource->slug])}}" class="db-list-edit view-i" target="_blank"><i class="fa fa-eye"></i></a>

								<a href="{{route('setting.admin.room')}}?r={{$resource->id}}" class="db-list-edit view-i" target="_blank"><i class="fa fa-bed"></i></a>

							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else 
			<div class="alert alert-primary" role="alert">
			  	No resources found!
			</div>
		@endif
	</div>
</div>