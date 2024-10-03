<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ $h1 }}</h1>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form action="{{ route('admin.about.update', ['type' => $service->type]) }}" method="POST" enctype="multipart/form-data">

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
    <div class="form-group mb-3">
    <label class="font-weight-bold">Banner</label>
    @if(isset($service->banner)) <!-- Assuming you're editing an existing record and 'banner' holds the file path -->
        <div class="mt-2">
            <img id="banner-preview" src="{{ asset('storage/' . $service->banner) }}" alt="Banner Preview" width="200">
        </div>
    @endif
    <input class="form-control @error('banner') is-invalid @enderror" type="file" name="banner" id="banner" accept="image/*">
    
        <!-- error message untuk username -->
        @error('banner')
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