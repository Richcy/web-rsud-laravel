@extends('admin.layouts.dashboard')

@section('title', 'Tentang | Penilaian Mutu')

@section('content')

@include('admin.about.contentAbout', ['h1'=> 'Penilaian Mutu'])

@endsection

@section('script')
<script src="{{ asset('admin/vendor/tinymce/tinymce.min.js') }}"></script>

<script>
    tinymce.init({
        selector: '#description',
        license_key: 'gpl',
        height: 300,
        plugins: 'lists link image preview',
        toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | bullist numlist | link image',
    });

</script>
@endsection
