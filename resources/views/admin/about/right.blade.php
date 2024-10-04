@extends('admin.layouts.dashboard')

@section('title', 'Tentang | Hak dan Kewajiban Pasien')

@section('content')

@include('admin.about.aboutContent', ['h1'=> 'Hak dan Kewajiban Pasien'])

@endsection
