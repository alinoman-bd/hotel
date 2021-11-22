@extends('layouts.app')
@section('content')
@include('includes.common.bradcrum',[
'title' => 'CONTACT US',
'description' => 'Feel free to call and send query messages'
])

@include('includes.contact.front-contact')
@endsection