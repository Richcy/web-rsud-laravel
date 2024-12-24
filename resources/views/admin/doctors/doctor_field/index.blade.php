@extends('admin.layouts.dashboard')

@section('title', 'Admin | Bidang Dokter')

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
    <h1 class="h3 mb-2 text-gray-800">Bidang Dokter</h1>

    <div class="row ml-0 mb-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addData"><span><i class="fa fa-plus"></i></span> Add Data</button>
    </div>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Bidang Dokter</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="DoctorsTable" width="100%">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>#</th>
                            <th>Nama</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Action</th>
                            <th>#</th>
                            <th>Nama</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($fieldDoctors as $fd)
                        <tr>
                            <td class="text-center" style="width: 20%;">
                                <div style="display: flex; justify-content: center; gap: 5px;">
                                    <button data-toggle="modal" data-target="#editData{{ $loop->iteration }}" class="btn btn-warning">Edit</button>

                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('dokter.destroyDoctorField', $fd->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>

                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $fd->name }}</td>
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
            <form action="{{ route('dokter.storeDoctorField') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3" style="margin-top: 2%;">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name">
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

<!-- Modal Edit data-->
@foreach ($fieldDoctors as $fd)
<div class="modal fade" id="editData{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data {{ $fd->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dokter.updateDoctorField', $fd->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3" style="margin-top: 2%;">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $fd->name }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

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