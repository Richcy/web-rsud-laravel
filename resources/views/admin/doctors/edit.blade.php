@extends('admin.layouts.dashboard')

@section('title', 'Doctor | Edit Doctors')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Data Dokter</h1>
    <form action="{{ route('dokter.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label class="font-weight-bold">NAME</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukkan name">

            <!-- error message untuk name -->
            @error('name')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">FIELD</label>
            <input type="text" class="form-control @error('field') is-invalid @enderror" name="field" value="{{ old('field') }}" placeholder="Masukkan field">

            <!-- error message untuk name -->
            @error('field')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">OFFICE</label>
            <input type="text" class="form-control @error('office') is-invalid @enderror" name="office" value="{{ old('office') }}" placeholder="Masukkan office">

            <!-- error message untuk name -->
            @error('office')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">EXPERIENCE</label>
            <input type="text" class="form-control @error('experience') is-invalid @enderror" name="experience" value="{{ old('experience') }}" placeholder="Masukkan experience">

            <!-- error message untuk experience -->
            @error('experience')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">YEAR</label>
            <input type="text" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year') }}" placeholder="Masukkan year">

            <!-- error message untuk year -->
            @error('year')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">MONTH</label>
            <input type="text" class="form-control @error('month') is-invalid @enderror" name="month" value="{{ old('month') }}" placeholder="Masukkan month">

            <!-- error message untuk month -->
            @error('month')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">ALUMNI</label>
            <input type="text" class="form-control @error('alumni') is-invalid @enderror" name="alumni" value="{{ old('alumni') }}" placeholder="Masukkan alumni">

            <!-- error message untuk alumni -->
            @error('alumni')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">NIP</label>
            <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ old('nip') }}" placeholder="Masukkan nip">

            <!-- error message untuk nip -->
            @error('nip')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">STR</label>
            <input type="text" class="form-control @error('str') is-invalid @enderror" name="str" value="{{ old('str') }}" placeholder="Masukkan str">

            <!-- error message untuk str -->
            @error('str')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">SIP</label>
            <input type="text" class="form-control @error('sip') is-invalid @enderror" name="sip" value="{{ old('sip') }}" placeholder="Masukkan sip">

            <!-- error message untuk sip -->
            @error('sip')
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

        <div class="form-group mb-3">
            <label class="font-weight-bold">LANG</label>
            <input type="text" class="form-control @error('lang') is-invalid @enderror" name="lang" value="{{ old('lang') }}" placeholder="Masukkan lang">

            <!-- error message untuk lang -->
            @error('lang')
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