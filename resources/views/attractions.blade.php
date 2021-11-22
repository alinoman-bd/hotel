@extends('layouts.app')
@section('content')
@include('includes.common.bradcrum',[
'title' => 'ATTRACTIONS',
'description' => 'All new features and facilities'
])

@include('includes.attractions.front')
@endsection