@extends('layouts.admin')
@section('content')
@include('includes.common.bradcrum',[
'title' => 'ATTRACTIONS',
'description' => 'Please add attractions.',
'add' => 'attraction',
'modal_id_name' => 'attractions_modal'
])

@include('includes.attractions.admin')
@include('includes.modal.attractions-modal')
@endsection