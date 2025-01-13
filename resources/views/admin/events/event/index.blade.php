@extends('admin.layouts.dashboard')

@section('title', 'Admin | Event')

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
    @elseif (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Event</h1>

    <div class="row ml-0 mb-2">
        <a href="{{ route('event.create') }}" class="btn btn-primary">
            <span class="text">Tambah Event</span>
        </a>
    </div>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Event</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="EventsTable" width="100%">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>#</th>
                            <th>Poster</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Kategori</th>
                            <th>Lokasi</th>
                            <th>URL</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                        <tr>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('event.destroy', $event->id) }}" method="POST">
                                    <a href="{{ route('event.edit', $event->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>
                            </td>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-center">
                                <img src="{{ asset('/storage/'.$event->img) }}" class="rounded" style="width: 150px">
                            </td>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->description }}</td>
                            <td>{{ $event->category->name }}</td>
                            <td>{{ $event->location }}</td>
                            <td>{{ $event->url }}</td>
                            <td>{{ $event->start_date }}</td>
                            <td>{{ $event->end_date }}</td>
                            <td>{{ $event->start_time }}</td>
                            <td>{{ $event->end_time }}</td>
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
    $('#EventsTable').DataTable();
</script>

@endsection