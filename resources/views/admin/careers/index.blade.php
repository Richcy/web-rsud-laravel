@extends('admin.layouts.dashboard')

@section('title', 'Admin | Career')

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
    <h1 class="h3 mb-2 text-gray-800">Article</h1>

    <div class="row ml-0 mb-2">
        <a href="{{ route('karir.create') }}" class="btn btn-primary">
            <span class="text">Tambah Career</span>
        </a>
    </div>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Karir</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="CareersTable" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>title</th>
                            <th>sub_desc</th>
                            <th>description</th>
                            <th>url</th>
                            <th>img</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>title</th>
                            <th>sub_desc</th>
                            <th>description</th>
                            <th>url</th>
                            <th>img</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($careers as $career)
                        <tr>
                            <td>{{ $career->id }}</td>
                            <td>{{ $career->title }}</td>
                            <td>{{ $career->sub_desc }}</td>
                            <td>{{ $career->description }}</td>
                            <td>{{ $career->url }}</td>
                            <td class="text-center">
                                <img src="{{ asset('/storage/'.$career->img) }}" class="rounded" style="width: 150px">
                            </td>
                            <td>{{ $career->status }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('karir.destroy', $career->id) }}" method="POST">
                                    <a href="{{ route('karir.show', $career->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                    <a href="{{ route('karir.edit', $career->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>
                            </td>
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
    $('#CareersTable').DataTable();
</script>

@endsection