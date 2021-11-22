@extends('layouts.admin')
@section('content')
@include('includes.common.bradcrum',[
'title' => 'ABOUT US',
'description' => 'Please add about informations.',
'add' => 'about',
'modal_id_name' => 'about_modal'
])

@include('includes.about.admin')
@include('includes.modal.about-modal')
@endsection