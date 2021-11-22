@if(count($seas) > 0)
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
	  		@foreach ($seas as $sea)
		    	<tr>
				    <th scope="row">{{ $number }}</th>
				    <td>{{$sea->name}}</td>
				    <td>{{$sea->slug}}</td>
				    <td>{{$sea->seo_title}}</td>
				    <td>{{$sea->seo_tag}}</td>
				    <td>{{$sea->seo_keyword}}</td>
				    <td>
				    	{{ substr(strip_tags($sea->seo_description),0,100) }}
				    	@if(strlen(strip_tags($sea->seo_description)) > 100) ... @endif
				    </td>
				    <td>
				    	<button class="btn btn-primary" onclick="editSea({{$sea->id}})"><i class="fas fa-edit"></i></button>
				    </td>
		    	</tr>
		    	@php
		    		$number++;
		    	@endphp
	    	@endforeach
	  	</tbody>
	</table>
@endif	