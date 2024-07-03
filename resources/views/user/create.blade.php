@extends('layout.master')
@section('content')
<div  style="margin-top:30px" class="container">
    <h4> Tambah Data User </h4>

    @if (count($errors) > 0)
        <ul class="alert alert-danger" style="list-style-type: none">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form style="margin-top:50px;" method="POST" action="{{ route('data_user.store') }} ">
    @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Nama (username)</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Password</label>
            <input type="text" class="form-control" name="password">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Confirm Password</label>
            <input type="text" class="form-control" name="password_confirmation">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Level</label>
            <select class="form-control" name="level">
                <option value="">Pilih Level</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div>
            <button class="btn btn-primary" style="margin-top:10px;width:100%" type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection