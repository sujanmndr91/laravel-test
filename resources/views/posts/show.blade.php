@extends('layouts.app')

@section('content')
<div class="container">

    <div class="panel-body justify-content-center">

        <a href="{{ route('create') }}">Create a post</a>

        @foreach ($posts as $post)

        <h2>{{ $post->title }}</h2>
        <p>{{ $post->body }}</p>

        <!-- TODO: Delete Button -->
        <form action="/posts/{{ $post->id }}" method="POST">
            {{ csrf_field() }}

            {{ method_field('DELETE') }}
            <button type="submit"> Delete </button>
        <a href="/posts/{{ $post->id }}">Edit</a>

        </form>


        @endforeach
    </div>
</div>
@endsection