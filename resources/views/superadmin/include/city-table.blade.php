@if(count($cities) > 0)
	<table class="table table-striped table-dark rc-tbl">
		<thead>
		    <tr>
			    <th scope="col">Sl</th>
			    <th scope="col">Name</th>
			    <th scope="col">Slug</th>
			    <th scope="col">Seo Title</th>
			    <th scope="col">Tag</th>
			    <th scope="col">Keyword</th>
			    <th scope="col">Description</th>
			    <th scope="col">Action</th>
		    </tr>
		</thead>
	  	<tbody>
	  		@php
	  			$number = 1;
	  		@endphp
	  		@foreach ($cities as $city)
		    	<tr>
				    <th scope="row">{{ $number }}</th>
				    <td>{{$city->name}}</td>
				    <td>{{$city->slug}}</td>
				    <td>{{$city->seo_title}}</td>
				    <td>{{$city->seo_tag}}</td>
				    <td>{{$city->seo_keyword}}</td>
				    <td>
				    	{{ substr(strip_tags($city->seo_description),0,100) }}
				    	@if(strlen(strip_tags($city->seo_description)) > 100) ... @endif
				    </td>
				    <td>
				    	<button class="btn btn-primary" onclick="editCity({{$city->id}})"><i class="fas fa-edit"></i></button>
				    </td>
		    	</tr>
		    	@php
		    		$number++;
		    	@endphp
	    	@endforeach
	  	</tbody>
	</table>
@endif	