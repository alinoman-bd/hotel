@extends('layouts.admin')
@section('content')
@include('includes.common.bradcrum',[
'title' => 'Logo Settings',
'description' => 'Please provide your cradentials',
'add' => 'logo',
'modal_id_name' => 'logo_model'
])

@include('includes.logo.admin')
@include('includes.modal.logo-modal')
@endsection