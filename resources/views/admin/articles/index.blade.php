@extends('admin.layouts.dashboard')

@section('title', 'Admin | Article')

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
        <a href="{{ route('artikel.create') }}" class="btn btn-primary">
            <span class="text">Tambah Article</span>
        </a>
    </div>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Artikel</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="ArticlesTable" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>title</th>
                            <th>sub_desc</th>
                            <th>description</th>
                            <th>category</th>
                            <th>img</th>
                            <th>author</th>
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
                            <th>category</th>
                            <th>img</th>
                            <th>author</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->sub_desc }}</td>
                            <td>{{ $article->description }}</td>
                            <td>{{ $article->category }}</td>
                            <td class="text-center">
                                <img src="{{ asset('/storage/'.$article->img) }}" class="rounded" style="width: 150px">
                            </td>
                            <td>{{ $article->author }}</td>
                            <td>{{ $article->status }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('artikel.destroy', $article->id) }}" method="POST">
                                    <a href="{{ route('artikel.show', $article->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                    <a href="{{ route('artikel.edit', $article->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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
    $('#ArticlesTable').DataTable();
</script>

@endsection