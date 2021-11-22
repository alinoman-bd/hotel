@extends('layouts.admin')
@section('content')
@include('includes.common.bradcrum',[
'title' => 'ROOMS & RATES',
'description' => 'Add and update your room type informations',
'add' => 'room',
'modal_id_name' => 'room_modal'
])

@include('includes.room.admin')
@include('includes.modal.room-modal')
@include('includes.modal.add-image-modal')
@endsection