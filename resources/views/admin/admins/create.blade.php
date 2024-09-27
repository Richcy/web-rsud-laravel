@extends('admin.layouts.app')

@section('title', 'Admin | Add Admins')

@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tambah Data Admin</h1>
                    <form action="{{ route('admins.store') }}" method="POST" enctype="multipart/form-data">
                    
                        @csrf
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">USERNAME</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Masukkan username">
                        
                            <!-- error message untuk username -->
                            @error('username')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">PASSWORD</label>
                            <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Masukkan password">                        
                            <!-- error message untuk password -->
                            @error('password')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

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
                            <label class="font-weight-bold">EMAIL</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan email">
                        
                            <!-- error message untuk name -->
                            @error('email')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">ROLE</label>
                            <input type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" placeholder="Masukkan role">
                        
                            <!-- error message untuk name -->
                            @error('role')
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