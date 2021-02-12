@extends('layouts.app')

@section('content')
<div class="container">

    <div class="panel-body justify-content-center">


        @foreach ($posts as $post)

        <h2>{{ $post->title }}</h2>
        <p>{{ $post->body }}</p>
        <p>Posted By {{$post->user->name}}</p>
        <a href="/posts/{{$post->id}}">Read More</a>
        <p>Post Created at {{$post->created_at->diffForHumans()}}</p>

        @endforeach
    </div>
</div>
@endsection