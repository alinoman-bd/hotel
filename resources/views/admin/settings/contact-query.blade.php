@extends('layouts.admin')
@section('content')
@include('includes.common.bradcrum',[
'title' => 'User Query',
'description' => 'People want to contact you',
])

@include('includes.contact.user-query')
@endsection