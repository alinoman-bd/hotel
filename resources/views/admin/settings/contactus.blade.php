@extends('layouts.admin')
@section('content')
@include('includes.common.bradcrum',[
'title' => 'CONTACT US',
'description' => 'Please add your contact informations',
'add' => 'contact',
'modal_id_name' => 'contact_modal'
])

@include('includes.contact.admin-contact')
@include('includes.modal.contact-modal')
@endsection