
@if(@$resource)
@php $fac = Helper::facilities(@$resource); @endphp
@else 
@php $fac = []; @endphp
@endif
<div class="modal fade ctm-modal" id="facilityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Facilities</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          @if(count($facilities) > 0)
          @foreach ($facilities as $facility)
          <div class="col-md-3">
            <label class="ctm-container"> {{ $facility->name }}
              <input type="checkbox" type="checkbox" value="{{$facility->id}}" id="defaultCheck1" name="facilities[]" @if(in_array($facility->id,$fac)) checked @endif class="app-faclitites">
              <span class="checkmark"></span>
            </label>
            <!-- <div class="form-check">
              <input class="form-check-input" type="checkbox" value="{{$facility->id}}" id="defaultCheck1" name="facilities[]" @if(in_array($facility->id,$fac)) checked @endif>
              <label class="form-check-label" for="defaultCheck1">
                {{ $facility->name }}
              </label>
            </div> -->
          </div>
          @endforeach    
          @endif
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
      </div>

    </div>
  </div>
</div>