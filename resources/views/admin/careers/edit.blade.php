@extends('admin.layouts.dashboard')

@section('title', 'Career | Edit Career')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Data Career</h1>
    <form action="{{ route('karir.update', $career->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label class="font-weight-bold">Judul</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $career->title) }}" placeholder="">

            <!-- error message untuk title -->
            @error('title')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">Deskripsi Singkat</label>
            <input type="text" class="form-control @error('sub_desc') is-invalid @enderror" name="sub_desc" value="{{ old('sub_desc', $career->sub_desc) }}" placeholder="">

            <!-- error message untuk name -->
            @error('sub_desc')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">Deskripsi</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description', $career->description) }}" placeholder="">

            <!-- error message untuk name -->
            @error('description')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">Poster</label>
            <!-- Preview Image -->
            <img id="imgPreview" src="" alt="Preview Image" style="max-width: 100%; max-height: 200px; display: none;">
            <div class="mt-3">
                <input
                    type="file"
                    class="form-control @error('img') is-invalid @enderror"
                    name="img"
                    id="imgInput"
                    value="{{ old('img') }}"
                    accept="image/*"
                    onchange="previewImage(event)">
            </div>

            <!-- Error message -->
            @error('img')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
        <button type="reset" class="btn btn-md btn-warning">RESET</button>
    </form>

</div>
<!-- /.container-fluid -->
@endsection

@section('script')

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('imgPreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    }
</script>
@endsection