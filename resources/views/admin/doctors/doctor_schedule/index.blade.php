@extends('admin.layouts.dashboard')

@section('title', 'Admin | Jadwal Dokter')

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
    <h1 class="h3 mb-2 text-gray-800">Jadwal Dokter</h1>

    <div class="row ml-0 mb-2">
        <a href="{{ route('jadwal-dokter.create') }}" class="btn btn-primary">
            <span class="text">Tambah Jadwal Dokter</span>
        </a>
    </div>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Jadwal Dokter</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="DoctorsTable" width="100%">
                    <thead>
                        <tr>
                            <th rowspan="2" class="row-2">Action</th>
                            <th rowspan="2" class="row-2">#</th>
                            <th rowspan="2" class="row-2">Dokter</th>
                            <th colspan="7" style="text-align: center;">Jadwal</th>
                        </tr>
                        <tr>
                            <th>Senin</th>
                            <th>Selasa</th>
                            <th>Rabu</th>
                            <th>Kamis</th>
                            <th>Jumat</th>
                            <th>Sabtu</th>
                            <th>Minggu</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th rowspan="2" class="row-2">Action</th>
                            <th rowspan="2" class="row-2">#</th>
                            <th rowspan="2" class="row-2">Dokter</th>
                            <th colspan="7" style="text-align: center;">Jadwal</th>
                        </tr>
                        <tr>
                            <th>Senin</th>
                            <th>Selasa</th>
                            <th>Rabu</th>
                            <th>Kamis</th>
                            <th>Jumat</th>
                            <th>Sabtu</th>
                            <th>Minggu</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($doctorSchedules as $ds)
                        <tr>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('jadwal-dokter.destroy', $ds->id) }}" method="POST">
                                    <a href="{{ route('jadwal-dokter.edit', $ds->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>
                            </td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $ds->doctor->name }}</td>
                            <td>{{ $ds->senin }}</td>
                            <td>{{ $ds->selasa }}</td>
                            <td>{{ $ds->rabu }}</td>
                            <td>{{ $ds->kamis }}</td>
                            <td>{{ $ds->jumat }}</td>
                            <td>{{ $ds->sabtu }}</td>
                            <td>{{ $ds->minggu }}</td>
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