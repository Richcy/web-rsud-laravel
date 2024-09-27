@extends('admin.layouts.app')

@section('title', 'Admin | Show Admins')

@section('content')
<div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('/storage/admins/'.$admin->image) }}" class="rounded" style="width: 100%">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>{{ $admin->title }}</h3>
                        <hr/>
                        <p>{{ "Rp " . number_format($admin->price,2,',','.') }}</p>
                        <code>
                            <p>{!! $admin->description !!}</p>
                        </code>
                        <hr/>
                        <p>Stock : {{ $admin->stock }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection