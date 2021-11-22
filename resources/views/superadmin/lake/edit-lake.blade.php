<div class="row">
	<div class="col-md-12">
		<div class="row">
			<input type="hidden" name="id" value="{{$lake->id}}">
			<div class="col-md-6">
				<div class="form-group">
				    <label for="exampleInputEmail1">Name</label>
				    <input type="text" class="form-control" id="name" name="name" value="{{$lake->name}}" required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				    <label for="exampleInputEmail1">Slug</label>
				    <input type="text" class="form-control" id="slug" name="slug" value="{{$lake->slug}}" ed-id="{{$lake->id}}" model="App\Lake" required>
				    <span class="slug-div"></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				    <label for="exampleInputEmail1">Seo title</label>
				    <input type="text" class="form-control" id="seo_title" name="seo_title" value="{{$lake->seo_title}}" required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				    <label for="exampleInputEmail1">Seo Tag</label>
				    <input type="text" class="form-control" id="seo_tag" name="seo_tag" value="{{$lake->seo_tag}}">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
		    <label for="exampleInputEmail1">Keywords</label>
		    <input type="text" class="form-control" id="form-tags-1" name="seo_keyword" type="text" value="{{$lake->seo_keyword}}">
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
	    	<label for="seo_description">Description</label>
	    	<textarea class="form-control" id="summernote" rows="3" name="seo_description">{{$lake->seo_description}}</textarea>
	  	</div>

	  	 {{-- <div id="summernote"><p>Hello Summernote</p></div> --}}
	</div>
	

</div>