@extends('admin.layouts.dashboard')

@section('title', 'Tentang | Profil Rumah Sakit')

@section('content')
                
@include('admin.about.aboutContent', ['h1'=> 'Profil Rumah Sakit'])

@endsection
