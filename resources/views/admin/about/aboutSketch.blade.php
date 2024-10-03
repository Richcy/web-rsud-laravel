@extends('admin.layouts.dashboard')

@section('title', 'Tentang | Denah Rumah Sakit')

@section('content')

@include('admin.about.contentAbout', ['h1'=> 'Denah Rumah Sakit'])

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
