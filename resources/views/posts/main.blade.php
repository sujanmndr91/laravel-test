@extends('layouts.app')

@section('content')
<div class="container">

    <div class="panel-body justify-content-center">



        <h2>{{ $posts->title }}</h2>
        <p>{{ $posts->body }}</p>

      


    </div>
</div>
@endsection