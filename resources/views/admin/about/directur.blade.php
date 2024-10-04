@extends('admin.layouts.dashboard')

@section('title', 'Tentang | Sambutan Direktur')

@section('content')

@include('admin.about.aboutContent', ['h1'=> 'Sambutan Direktur'])

@endsection
