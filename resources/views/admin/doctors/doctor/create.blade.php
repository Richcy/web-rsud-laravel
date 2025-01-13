@extends('admin.layouts.dashboard')

@section('title', 'Dokter | Tambah Dokter')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Data Dokter</h1>
    <form action="{{ route('dokter.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="form-group mb-3">
            <label class="font-weight-bold">Nama Dokter</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="">

            <!-- error message untuk name -->
            @error('name')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">Bidang Keahlian</label>
            <select class="form-control @error('field') is-invalid @enderror" name="field">
                <option value="">-- Pilih Bidang Keahlian --</option>
                @foreach ($fieldDoctors as $field)
                <option value="{{ $field->id }}" {{ old('field') == $field->id ? 'selected' : '' }}>
                    {{ $field->name }}
                </option>
                @endforeach
            </select>

            <!-- Error message for field -->
            @error('field')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>


        <div class="form-group mb-3">
            <label class="font-weight-bold">Kantor/Unit Kerja</label>
            <input type="text" class="form-control @error('office') is-invalid @enderror" name="office" value="{{ old('office') }}" placeholder="">

            <!-- error message untuk name -->
            @error('office')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">NIP</label>
            <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ old('nip') }}" placeholder="">

            <!-- error message untuk nip -->
            @error('nip')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">SIP</label>
            <input type="text" class="form-control @error('sip') is-invalid @enderror" name="sip" value="{{ old('sip') }}" placeholder="">

            <!-- error message untuk sip -->
            @error('sip')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold">Foto</label>
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