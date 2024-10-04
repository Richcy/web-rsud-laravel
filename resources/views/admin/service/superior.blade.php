@extends('admin.layouts.dashboard')

@section('title', 'Layanan | Layanan Unggulan')

@section('content')

@include('admin.service.serviceContent', ['h1' => 'Layanan Unggulan'])

@endsection
