@extends('layouts.app')

@section('content')
<div class="container">

    <div class="panel-body justify-content-center">

        <a href="{{ route('create') }}">Create a post</a>

         <a class="btn btn-warning" href="{{ route('exportUser') }}">Export User Data</a>
         <a class="btn btn-warning" href="{{ route('exportPost') }}">Export Post Data</a>



        @foreach ($posts as $post)

        <h2 class="mt-3">{{ $post->title }}</h2>
        <p>{{ $post->body }}</p>

        <!-- TODO: Delete Button -->
        <form action="/posts/{{ $post->id }}" method="POST">
            {{ csrf_field() }}

            {{ method_field('DELETE') }}
            <a href="/posts/update/{{ $post->id }}" class="mr-2">Edit</a>

            <button type="submit"> Delete </button>

        </form>


        @endforeach
    </div>
</div>
@endsection