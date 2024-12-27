@extends('admin.layouts.dashboard')

@section('title', 'Article | Show Article')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <img src="{{ asset('/storage/'.$article->img) }}" class="rounded" style="width: 100%">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h3>{{ $article->id }}</h3>
                    <p>{{ $article->title }}</p>
                    <p>{{ $article->sub_desc }}</p>
                    <p>{{ $article->description }}</p>
                    <p>{{ $article->category }}</p>
                    <p>{{ $article->author }}</p>
                    <p>{{ $article->status }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection