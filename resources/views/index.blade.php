@extends('layouts.app')

@section('content')
<div class="container">

<div class="panel-body justify-content-center">
    @foreach ($posts as $post)

    <h2>{{ $post->title }}</h2>
    <p>{{ $post->body }}</p>
                            
    @endforeach
</div>
</div>
@endsection