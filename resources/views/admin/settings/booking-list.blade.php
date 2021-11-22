@extends('layouts.admin')
@section('content')
@include('includes.common.bradcrum',[
'title' => 'BOOKING',
'description' => 'Showing all booking list',
'add' => 'booking'
])

@include('includes.booking.new')
@endsection