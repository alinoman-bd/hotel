@extends('layouts.admin')
@section('content')
@include('includes.common.bradcrum',[
'title' => 'SLIDES',
'description' => 'Add and update any slider for landing page',
'add' => 'slider',
'modal_id_name' => 'slide_modal'
])

@include('includes.slider.admin')
@include('includes.modal.slider-modal')
@endsection