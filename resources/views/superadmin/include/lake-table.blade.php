@if(count($lakes) > 0)
	<input type="hidden" name="page" id="lak-page" value="{{$page}}">
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
	  			if($page > 1){
	  				$page = $page - 1;
	  				$number = $page * $item + 1;
	  			}
	  		@endphp
	  		@foreach ($lakes as $lake)
		    	<tr>
				    <th scope="row">{{ $number }}</th>
				    <td>{{$lake->name}}</td>
				    <td>{{$lake->slug}}</td>
				    <td>{{$lake->seo_title}}</td>
				    <td>{{$lake->seo_tag}}</td>
				    <td>{{$lake->seo_keyword}}</td>
				    <td>
				    	{{ substr(strip_tags($lake->seo_description),0,100) }}
				    	@if(strlen(strip_tags($lake->seo_description)) > 100) ... @endif
				    </td>
				    <td>
				    	<button class="btn btn-primary" onclick="editLake({{$lake->id}})"><i class="fas fa-edit"></i></button>
				    </td>
		    	</tr>
		    	@php
		    		$number++;
		    	@endphp
	    	@endforeach
	  	</tbody>
	</table>
	<div class="text-center r-pgi">
		{{ $lakes->links() }}
	</div>
@endif	