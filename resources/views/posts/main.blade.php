@extends('layouts.app')

@section('content')
<div class="container">

    <div class="panel-body justify-content-center">

         <a class="btn btn-warning mb-3" href="/exportComment?post_id=6&user_id=1">Export Comments Data</a>


        <h2>{{ $posts->title }}</h2>
        <p>{{ $posts->body }}</p>
        <p>{{ $posts->user->name }}</p>

        <form action="/comments/store/{{ $posts->id}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            @method('POST')
            @auth
            <!-- Comment Body -->
            <div class="form-group">

                <div class="col-sm-6">
                    <textarea type="text" name="comment" id="comment" class="form-control"></textarea>
                    @error('comment')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>

            <!-- Add Reply Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Reply
                    </button>
                </div>
            </div>
        </form>
        @endauth

        <form action="/exportComment" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            @method('POST')
          
            <!-- Comment Body -->
            <div class="form-group">

                <div class="col-sm-6">
                     <input type="text" id="post_id" class="" name="post_id" placeholder="Post Id" value="">

                     <input type="text" id="user_id" class="" name="user_id" placeholder="User Id" value="">

                    
                </div>
            </div>

            <!-- Add Reply Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Excel Export
                    </button>
                </div>
            </div>
        </form>

        @guest
        <div>
            <h6><a href="/login?redirect=/posts/{{$posts->id}}">Please Login to make a comment</a></h6>
        </div>
        @endguest

        @foreach($posts->comments as $comment)
            <div class="form-control mb-3">
            <h5 class="">{{$comment->comment}}</h5>
            <div class="">Commented By {{$comment->user->name}}, {{$comment->created_at->diffForHumans()}}</div>
            </div>
        @endforeach
      
    </div>
</div>
@endsection