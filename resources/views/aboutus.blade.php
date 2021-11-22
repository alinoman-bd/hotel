@extends('layouts.app')
@section('content')
@include('includes.common.bradcrum',[
'title' => 'ABOUT US',
'description' => 'We are always ready to serve you'
])

@include('includes.about.front')
@include('includes.statistics.front')
@include('includes.member.front') 
@endsection