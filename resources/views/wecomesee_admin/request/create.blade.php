@extends('layout.master')
@section('content')
<div  style="margin-top:30px" class="container">
    <h4> Tambah Data Request </h4>

    @if (count($errors) > 0)
        <ul class="alert alert-danger" style="list-style-type: none">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form enctype="multipart/form-data" style="margin-top:50px;" method="POST" action="{{ route('data_request.store') }} ">
    @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">User ID</label>
            <input type="text" class="form-control" name="user_id">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Service</label>
            <select class="form-control" name="service">
                <option value="Paket Jomblo">Paket Jomblo</option>
                <option value="Paket Couple">Paket Couple</option>
                <option value="Paket Sahabatan">Paket Sahabatan</option>
                <option value="Paket Kumplit">Paket Kumplit</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Nama Pemesan</label>
            <input type="text" class="form-control" name="nama_pemesan">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Nomor WhatsApp</label>
            <input type="tel" class="form-control" name="nomor_telepon">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Nama Bank</label>
            <input type="text" class="form-control" name="nama_bank">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Nomor Rekening</label>
            <input type="text" class="form-control" name="no_rekening">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Nominal</label>
            <input type="number" class="form-control" name="nominal">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Bukti Transfer</label>
            <input type="file" class="form-control" name="bukti_transfer">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Note</label>
            <textarea type="text" class="form-control" name="note"></textarea>
        </div>
        <div>
            <button class="btn btn-primary mt-5 mb-5" style="margin-top:10px;width:100%" type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection