@extends('layouts.admin')
@section('content')
@include('includes.common.bradcrum',[
'title' => 'USER LIST',
'description' => 'People visited your hotel',
'add' => 'user'
])

@include('includes.user.admin')
@endsection