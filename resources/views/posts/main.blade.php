@extends('layouts.app')

@section('content')
<div class="container">

    <div class="panel-body justify-content-center">



        <h2>{{ $posts->title }}</h2>
        <p>{{ $posts->body }}</p>

        <form action="/comments" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            @method('POST')
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
        <div>
        </div>
        @foreach($posts->comments as $comment)
            {{$comment->comment}}
        @endforeach
        <div>
        </div>


    </div>
</div>
@endsection