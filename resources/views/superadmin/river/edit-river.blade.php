<div class="row">
	<div class="col-md-12">
		<div class="row">
			<input type="hidden" name="id" value="{{$river->id}}">
			<div class="col-md-6">
				<div class="form-group">
				    <label for="exampleInputEmail1">Name</label>
				    <input type="text" class="form-control" id="name" name="name" value="{{$river->name}}" required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				    <label for="exampleInputEmail1">Slug</label>
				    <input type="text" class="form-control" id="slug" name="slug" value="{{$river->slug}}" ed-id="{{$river->id}}" model="App\River" required>
				    <span class="slug-div"></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				    <label for="exampleInputEmail1">Seo title</label>
				    <input type="text" class="form-control" id="seo_title" name="seo_title" value="{{$river->seo_title}}" required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				    <label for="exampleInputEmail1">Seo Tag</label>
				    <input type="text" class="form-control" id="seo_tag" name="seo_tag" value="{{$river->seo_tag}}">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
		    <label for="exampleInputEmail1">Keywords</label>
		    <input type="text" class="form-control" id="form-tags-1" name="seo_keyword" type="text" value="{{$river->seo_keyword}}">
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
	    	<label for="seo_description">Description</label>
	    	<textarea class="form-control" id="summernote" rows="3" name="seo_description">{{$river->seo_description}}</textarea>
	  	</div>

	  	 {{-- <div id="summernote"><p>Hello Summernote</p></div> --}}
	</div>
	

</div>