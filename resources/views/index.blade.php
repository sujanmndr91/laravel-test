@extends('layouts.app')

@section('content')
<div class="container">

    <div class="panel-body justify-content-center">


        @foreach ($posts as $post)

        <h2>{{ $post->title }}</h2>
        <p>{{ $post->body }}</p>
        <p>Posted By <a href="">{{$post->user->name}}</p></a></p>
        <a href="/posts/{{$post->id}}">Read More</a>

        @endforeach
    </div>
</div>
@endsection