@extends('layout.master')
@section('content')
<div  style="margin-top:30px" class="container">
    <h4> Tambah Data Kategori </h4>

    @if (count($errors) > 0)
        <ul class="alert alert-danger" style="list-style-type: none">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form style="margin-top:50px;" method="POST" action="{{ route('data_kategori.store') }} ">
    @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Nama Kategori</label>
            <input type="text" class="form-control" name="nama">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Status Aktif</label>
            <select class="form-control" name="flag">
                <option value="Y">Aktif</option>
                <option value="N">Belum Aktif</option>
            </select>
        </div>
        <div>
            <button class="btn btn-primary mt-5" style="margin-top:10px;width:100%" type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection