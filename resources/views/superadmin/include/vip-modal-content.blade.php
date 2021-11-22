 <div class="form-group">
 	<input type="hidden" id="selected_rec_id" value="{{$resource['id']}}">
    <label for="exampleFormControlSelect1">Example select</label>
    <select class="form-control" id="vipId">
      	<option value="3">choose package</option>
      	@if(count($packages) > 0)
      		@foreach ($packages as $pkg)
      			@if($pkg->name != 'Free')
      			<option value="{{$pkg->id}}" @if($pkg->id == @$resource['package']['id']) selected @endif>{{$pkg->name}}</option>
      			@endif
      		@endforeach
      	@endif	
    </select>
</div>