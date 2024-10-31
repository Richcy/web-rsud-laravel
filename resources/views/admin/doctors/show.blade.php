@extends('admin.layouts.dashboard')

@section('title', 'Doctors | Show Doctor')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <img src="{{ asset('/storage/'.$doctor->img) }}" class="rounded" style="width: 100%">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h3>{{ $doctor->name }}</h3>
                    <p>{{ $doctor->field }}</p>
                    <p>{{ $doctor->office }}</p>
                    <p>{{ $doctor->experience }}</p>
                    <p>{{ $doctor->year }}</p>
                    <p>{{ $doctor->month }}</p>
                    <p>{{ $doctor->alumni }}</p>
                    <p>{{ $doctor->nip }}</p>
                    <p>{{ $doctor->str }}</p>
                    <p>{{ $doctor->status }}</p>
                    <p>{{ $doctor->lang }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection