@extends('admin.layouts.dashboard')

@section('title', 'Event | Edit Events')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Data Event</h1>
    <form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label class="font-weight-bold">Judul Event</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $event->title) }}" placeholder="">

            <!-- error message untuk title -->
            @error('title')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">Deskripsi Singkat</label>
            <input type="text" class="form-control @error('sub_desc') is-invalid @enderror" name="sub_desc" value="{{ old('sub_desc', $event->sub_desc) }}" placeholder="">

            <!-- error message untuk name -->
            @error('sub_desc')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">Deskripsi</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description', $event->description) }}" placeholder="">

            <!-- error message untuk name -->
            @error('description')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">Kategori</label>
            <select class="form-control @error('category') is-invalid @enderror" name="category">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($eventCategories as $ec)
                <option value="{{ $ec->id }}" {{ old('category') == $ec->id ? 'selected' : '' }}>
                    {{ $ec->name }}
                </option>
                @endforeach
            </select>

            <!-- error message untuk category -->
            @error('category')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">URL</label>
            <input type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url', $event->url) }}" placeholder="">

            <!-- error message untuk url -->
            @error('url')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">Tanggal Mulai</label>
            <input type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date', $event->start_date) }}" placeholder="">

            <!-- error message untuk start_date -->
            @error('start_date')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">Tanggal Selesai</label>
            <input type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date', $event->end_date) }}" placeholder="">

            <!-- error message untuk end_date -->
            @error('end_date')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">Waktu Mulai</label>
            <input type="time" class="form-control @error('start_time') is-invalid @enderror" name="start_time" value="{{ old('start_time', $event->start_time) }}" placeholder="">

            <!-- error message untuk start_time -->
            @error('start_time')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">Waktu Selesai</label>
            <input type="time" class="form-control @error('end_time') is-invalid @enderror" name="end_time" value="{{ old('end_time', $event->end_time) }}" placeholder="">

            <!-- error message untuk end_time -->
            @error('end_time')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">Lokasi</label>
            <input type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location', $event->location) }}" placeholder="">

            <!-- error message untuk location -->
            @error('location')
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