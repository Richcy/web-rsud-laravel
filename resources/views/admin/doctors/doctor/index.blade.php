@extends('admin.layouts.dashboard')

@section('title', 'Admin | Dokter')

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
    <h1 class="h3 mb-2 text-gray-800">Dokter</h1>

    <div class="row ml-0 mb-2">
        <a href="{{ route('dokter.create') }}" class="btn btn-primary">
            <span class="text">Tambah Dokter</span>
        </a>
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
                            <th>Bidang Keahlian</th>
                            <th>Kantor/Unit Kerja</th>
                            <th>NIP</th>
                            <th>SIP</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Action</th>
                            <th>#</th>
                            <th>Image</th>
                            <th>Nama</th>
                            <th>Bidang Keahlian</th>
                            <th>Kantor/Unit Kerja</th>
                            <th>NIP</th>
                            <th>SIP</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($doctors as $doctor)
                        <tr>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('dokter.destroy', $doctor->id) }}" method="POST">
                                    <a href="{{ route('dokter.edit', $doctor->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>
                            </td>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-center">
                                <img src="{{ asset('/storage/'.$doctor->img) }}" class="rounded" style="width: 150px">
                            </td>
                            <td>{{ $doctor->name }}</td>
                            <td>{{ $doctor->field }}</td>
                            <td>{{ $doctor->office }}</td>
                            <td>{{ $doctor->nip }}</td>
                            <td>{{ $doctor->sip }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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