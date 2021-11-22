@extends('layouts.admin')
@section('content')
@include('includes.common.bradcrum',[
'title' => 'IMAGED & GALLERY',
'description' => 'Make new gallery and add images',
'add' => 'Gallery',
'modal_id_name' => 'gallery_modal'
])

@include('includes.gallery.admin')
@include('includes.modal.gallery-modal')
@endsection