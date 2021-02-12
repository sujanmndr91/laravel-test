@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">
            <div class="post-preview my-3">
                @foreach ($posts as $post)

                <h2 class="post-title">
                    {{ $post->title }}
                </h2>
                <h4 class="post-subtitle">
                    {{ Str::limit($post->body, 5) }}
                </h4>
                
                <a href="/posts/{{$post->id}}">Read More</a>

                <p class="post-meta mb-5">Posted by
                    {{$post->user->name}}, 
                    {{$post->created_at->diffForHumans()}}
                </p>
                @endforeach
            </div>
            {{ $posts->links() }}


        </div>
    </div>
</div>
@endsection

