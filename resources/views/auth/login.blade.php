@extends('layouts.app')

@section('content')
@if (session('status'))
      <div class="text-red">
            {{ session('status') }}
      </div>
@endif


<form method="POST" action="/login" class="form-control">
     {{ @csrf_field() }}    

     <div class="form-group">
     <input type="text" id="email" class="" name="email" placeholder="Email" value={{ old('email') }}>
           <div lass="text-red">
           @error('email')
                 <div class="text-red">
                 {{ $message }}
                 </div>
           @enderror
           </div>
     </div>

     <div class="form-group">
     <input type="password" id="password" class="" name="password" placeholder="Password">
           @error('password')
           <div class="text-red">
           {{ $message }}
           </div>
           @enderror
     </div>

     <input type="submit" class="" value="Login">
</form>
@endsection