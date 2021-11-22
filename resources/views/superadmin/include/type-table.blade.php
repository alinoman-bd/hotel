@if(count($types) > 0)
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
	  		@foreach ($types as $type)
		    	<tr>
				    <th scope="row">{{ $number }}</th>
				    <td>{{$type->name}}</td>
				    <td>{{$type->slug}}</td>
				    <td>{{$type->seo_title}}</td>
				    <td>{{$type->seo_tag}}</td>
				    <td>{{$type->seo_keyword}}</td>
				    <td>
				    	{{ substr(strip_tags($type->seo_description),0,100) }}
				    	@if(strlen(strip_tags($type->seo_description)) > 100) ... @endif
				    </td>
				    <td>
				    	<button class="btn btn-primary" onclick="editCity({{$type->id}})"><i class="fas fa-edit"></i></button>
				    </td>
		    	</tr>
		    	@php
		    		$number++;
		    	@endphp
	    	@endforeach
	  	</tbody>
	</table>
@endif	