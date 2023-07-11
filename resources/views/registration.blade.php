@extends('layout')
@section('title','registration')
@section('content')
<div class="container">
    <div class="mt-5">
        @if($errors->any())
         <div class="col-12">
            @foreach($errors->all() as $error)
              <div class="alert alert-danger">{{$error}}</div>
            @endforeach
         </div>
        @endif
        @if(Session()->has('error'))
          <div class="alert alert-danger">{{Session('error')}}</div>
        @endif
    </div>
<form class="ms-auto me-auto mt-3" style="width:500px" action="{{route('registration.post')}}" method="post">
  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Full Name</label>
    <input type="name" class="form-control"  name="fname">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
   </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection