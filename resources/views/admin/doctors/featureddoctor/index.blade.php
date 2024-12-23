@extends('admin.layouts.dashboard')

@section('title', 'Admin | Featured Dokter')

@section('style')

<!-- Include DataTables CSS -->
<link rel="stylesheet" href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}">

@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Flash Message -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Featured Dokter</h1>

    <div class="row ml-0 mb-2">
        <button type="button"
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#addData"
            @if ($featuredDoctorCount>= 4) disabled @endif>
            <span><i class="fa fa-plus"></i></span> Add Data
        </button>
    </div>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Dokter</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="DoctorsTable" width="100%">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>#</th>
                            <th>Image</th>
                            <th>Nama</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Action</th>
                            <th>#</th>
                            <th>Image</th>
                            <th>Nama</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($featuredDoctors as $fd)
                        <tr>
                            <td class="text-center" style="width: 20%;">
                                <div style="display: flex; justify-content: center; gap: 5px;">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('dokter.destroyFeaturedDoctor', $fd->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>

                            <td>{{ $loop->iteration }}</td>
                            <td class="text-center">
                                <img src="{{ asset('/storage/'.$fd->doctor->img) }}" class="rounded" style="width: 150px">
                            </td>
                            <td>{{ $fd->doctor->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal Add data-->
<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dokter.storeFeaturedDoctor') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3" style="margin-top: 2%;">
                        <label class="form-label">Dokter</label>
                        <select class="select2 form-control" name="doctor_id" style="width: 100%;">
                            <option value="">-- Pilih Dokter --</option>
                            @foreach ($filterDoctor as $fd)
                            <option value="{{ $fd->id }}">{{ $fd->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- /.container-fluid -->
@endsection

@section('script')

<!-- Include DataTables JS -->
<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
    $('#DoctorsTable').DataTable();
</script>

@endsection