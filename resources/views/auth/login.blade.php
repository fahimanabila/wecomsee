@extends('layout.login_layout')
@section('content')
<div style="margin-top: 50px" class="container">
    <form style="width:50%;margin:0px auto;" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button style="margin-top:20px;width:100%;background:#ff6f2c;border:none;" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection