@extends('admin.layouts.dashboard')

@section('title', 'Article | Add Article')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Data Artikel</h1>
    <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="form-group mb-3">
            <label class="font-weight-bold">Penulis</label>
            <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ old('author') }}" placeholder="">

            <!-- error message untuk author -->
            @error('author')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">Judul</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="">

            <!-- error message untuk title -->
            @error('title')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">Deskripsi Singkat</label>
            <input type="text" class="form-control @error('sub_desc') is-invalid @enderror" name="sub_desc" value="{{ old('sub_desc') }}" placeholder="">

            <!-- error message untuk name -->
            @error('sub_desc')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">Deskripsi</label>
            <textarea class="form-control @error('description') is-invalid @enderror"
                id="description"
                name="description"
                placeholder="">{{ old('description', $article->description ?? '') }}</textarea>

            <!-- Error message for description -->
            @error('description')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">Kategori</label>
            <select class="form-control @error('category') is-invalid @enderror" name="category">
                <option value="">-- Pilih Kategori Artikel --</option>
                @foreach ($articleCategories as $category)
                <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>

            <!-- Error message for category -->
            @error('category')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">Poster</label>
            <input type="file" class="form-control @error('img') is-invalid @enderror" name="img">

            <!-- error message untuk img -->
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