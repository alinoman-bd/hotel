@if(count($searches) > 0)
	@foreach ($searches as $search)
		<div class="input-cnt" onclick="putSuggestion('{{$search}}')">{{$search}}</div>
	@endforeach
@endif	