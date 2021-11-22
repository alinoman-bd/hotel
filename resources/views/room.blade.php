@extends('layouts.app')
@section('content')
@include('includes.common.bradcrum',[
'title' => 'ROOMS & RATES',
'description' => 'Ckeck and book ourbeautiful rooms'
])

@include('includes.room.front')
@endsection