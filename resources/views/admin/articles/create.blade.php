@extends('admin.layouts.dashboard')

@section('title', 'Article | Add Article')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Data Article</h1>
    <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="form-group mb-3">
            <label class="font-weight-bold">title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan title">

            <!-- error message untuk title -->
            @error('title')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">sub_desc</label>
            <input type="text" class="form-control @error('sub_desc') is-invalid @enderror" name="sub_desc" value="{{ old('sub_desc') }}" placeholder="Masukkan sub_desc">

            <!-- error message untuk name -->
            @error('sub_desc')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" placeholder="Masukkan description">

            <!-- error message untuk name -->
            @error('description')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">category</label>
            <input type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" placeholder="Masukkan category">

            <!-- error message untuk category -->
            @error('category')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">author</label>
            <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ old('author') }}" placeholder="Masukkan author">

            <!-- error message untuk author -->
            @error('author')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">IMG</label>
            <input type="file" class="form-control @error('img') is-invalid @enderror" name="img">

            <!-- error message untuk img -->
            @error('img')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">STATUS</label>
            <input type="text" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status') }}" placeholder="Masukkan status">

            <!-- error message untuk status -->
            @error('status')
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