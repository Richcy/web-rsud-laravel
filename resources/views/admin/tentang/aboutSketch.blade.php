@extends('admin.layouts.dashboard')

@section('title', 'Tentang | Denah Rumah Sakit')

@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Denah Rumah Sakit</h1>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('admin.tentang.update', ['type' => $service->type]) }}" method="POST" enctype="multipart/form-data">
                    
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" placeholder="Masukkan Description">{{ old('description', $service->description) }}</textarea>
                        
                            <!-- error message untuk username -->
                            @error('description')
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

            </div>
            <!-- End of Main Content -->
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
