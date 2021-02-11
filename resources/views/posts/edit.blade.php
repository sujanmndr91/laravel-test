@extends('layouts.app')

@section('content')


<!-- New Post Form -->
<div class="container">
    <div class="justify-content-center">
        <form action="/posts/update/{{$posts->id}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            @method('PUT')

            <!-- Post Title -->
            <div class="form-group">
                <label for="post-title" class="col-sm-3 control-label">Enter Post Title</label>
                <div class="col-sm-6">
                    <input type="text" name="title" id="post-title" class="form-control" value="{{ $posts->title }}">
                    @error('title')
                    <div class="text-danger">
                        {{$message}}
                    </div> 
                    @enderror
                </div>
               
            </div>

            <!-- Post Body -->
            <div class="form-group">

                <div class="col-sm-6">
                    <textarea type="text" name="body" id="post-body" class="form-control">
                    {{ $posts->body }}
                    </textarea>
                    @error('body')
                        <div class="text-danger">
                            {{$message}}
                        </div>       
                    @enderror
                </div>
            </div>

            <!-- Add Post Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Update
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection