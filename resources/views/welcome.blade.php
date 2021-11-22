@extends('layouts.app')

@section('title', 'Home')

@section('sidebar')
@parent
@endsection

@section('content')
@include('includes.slider.front')
@include('includes.home.availability')
@include('includes.room.fronthome')
@include('includes.about.front')
@include('includes.gallery.front')
@endsection