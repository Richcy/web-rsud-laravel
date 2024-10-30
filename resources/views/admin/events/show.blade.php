@extends('admin.layouts.dashboard')

@section('title', 'Events | Show Event')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <img src="{{ asset('/storage/events/'.$event->img) }}" class="rounded" style="width: 100%">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h3>{{ $event->id }}</h3>
                    <p>{{ $event->title }}</p>
                    <p>{{ $event->sub_desc }}</p>
                    <p>{{ $event->description }}</p>
                    <p>{{ $event->category }}</p>
                    <p>{{ $event->url }}</p>
                    <p>{{ $event->start_date }}</p>
                    <p>{{ $event->end_date }}</p>
                    <p>{{ $event->start_time }}</p>
                    <p>{{ $event->end_time }}</p>
                    <p>{{ $event->location }}</p>
                    <p>{{ $event->status }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection