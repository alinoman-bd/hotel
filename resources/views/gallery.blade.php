@extends('layouts.app')
@section('content')
@include('includes.common.bradcrum',[
'title' => 'GALLERY',
'description' => 'All nice and beautiful rooms'
])

@include('includes.gallery.front')
@endsection