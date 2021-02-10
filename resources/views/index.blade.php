@extends('layouts.app')

@section('content')

<div class="panel-body">
    @foreach ($posts as $post)

    <h2>{{ $post->title }}</h2>
    <p>{{ $post->body }}</p>
                            
    @endforeach
</div>
@endsection