@extends('admin.layouts.dashboard')

@section('title', 'Tentang | Profil Rumah Sakit')

@section('content')
                
@include('admin.about.contentAbout', ['h1'=> 'Profil Rumah Sakit'])

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

<script>
    document.getElementById('banner').onchange = function (event) {
        const [file] = event.target.files;
        if (file) {
            document.getElementById('banner-preview').src = URL.createObjectURL(file);
        }
    };
</script>
@endsection
