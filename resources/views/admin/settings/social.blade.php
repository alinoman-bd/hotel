@extends('layouts.admin')
@section('content')
@include('includes.common.bradcrum',[
'title' => 'Social Settings',
'description' => 'Update social informations',
'add' => 'social',
'modal_id_name' => 'social_model'
])

@include('includes.social.admin')
@include('includes.modal.social-modal')
@endsection