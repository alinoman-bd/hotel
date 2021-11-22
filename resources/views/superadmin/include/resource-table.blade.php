@if(count($resources) > 0)
	<table class="table table-striped table-dark rc-tbl">
		<thead>
		    <tr>
			    <th scope="col">Sl</th>
			    <th scope="col">Image</th>
			    <th scope="col">Resource Name</th>
			    <th scope="col">User</th>
			    <th scope="col">Email</th>
			    <th scope="col">Phone</th>
			    <th scope="col">Address</th>
			    <th scope="col">Package</th>
			    <th scope="col">Status</th>
			    <th scope="col">Action</th>
		    </tr>
		</thead>
	  	<tbody>
	  		@php
	  			$number = 1;
	  			if($page > 1){
	  				$page = $page - 1;
	  				$number = $page * $item + 1;
	  			}
	  		@endphp
	  		@foreach ($resources as $rec)
		    	<tr>
				    <th scope="row">{{ $number }}</th>
				    <td><img src="{{asset($rec['image'])}}" style="width:30px;"></td>
				    <td>{{$rec['name']}}</td>
				    <td>{{$rec['user']['name']}}</td>
				    <td>{{$rec['email']}}</td>
				    <td>{{$rec['phone']}}</td>
				    <td>{{$rec['address']}}</td>
				    <td>
				    	<button type="button" class="btn btn-secondary">
				    		@if($rec['package'])
				    			{{$rec['package']['name']}}
				    		@else 
				    			None
				    		@endif	
				    	</button>
				    </td>
				    <td>
				    	@if($rec['is_active'] == 1)
				    		<button type="button" class="btn btn-primary" onclick="changeStatus({{$rec['id']}},'0')">Active</button>
				    	@else 
				    		<button type="button" class="btn btn-danger" onclick="changeStatus({{$rec['id']}},'1')">Deactive</button>
				    	@endif	
				    </td>
				    <td>
				    	<button class="btn btn-primary" onclick="makeVip({{$rec['id']}})" data-toggle="modal" data-target="#makVipModal"><i class="fas fa-edit"></i></button>
				    	<a href="{{route('loginasadmin',['user_id'=>$rec["user"]["id"]])}}" class="btn btn-primary"><i class="fa fa-male" aria-hidden="true"></i></a>
				    </td>
		    	</tr>
		    	@php
		    		$number++;
		    	@endphp
	    	@endforeach
	  	</tbody>
	</table>
	<div class="text-center r-pgi">
		{{ $resources->links() }}
	</div>
@endif	