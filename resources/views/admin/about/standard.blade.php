@extends('admin.layouts.dashboard')

@section('title', 'Tentang | Standard Pelayanan')

@section('content')
                
@include('admin.about.aboutContent', ['h1'=> 'Standard Pelayanan'])

@endsection
