@extends('layout.master')
@section('content')
<div  style="margin-top:30px" class="container">
    <h4> Tambah Data Destinasi </h4>

    @if (count($errors) > 0)
        <ul class="alert alert-danger" style="list-style-type: none">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form enctype="multipart/form-data" style="margin-top:50px;" method="POST" action="{{ route('data_destinasi.store') }} ">
    @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Nama Destinasi</label>
            <input type="text" class="form-control" name="nama_destinasi">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Nama Alias</label>
            <input type="text" class="form-control" name="nama_alias">
        </div>
        <div class="form-group">
            <input type="hidden" name="nama_kecamatan" id="nama_kecamatan" value="">
            <label for="exampleFormControlInput1">Nama Kecamatan</label>
            <select onchange="cariKelurahan()" class="form-control" id="kecamatan" name="kecamatan">
            </select>
        </div>
        <div class="form-group">
            <input type="hidden" name="nama_kelurahan" id="nama_kelurahan" value="">
            <label for="exampleFormControlInput1">Nama Kelurahan</label>
            <select onchange="isiKelurahan()" class="form-control" id="kelurahan" name="kelurahan">
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Alamat</label>
            <input type="text" class="form-control" name="alamat">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Link Maps</label>
            <input type="text" class="form-control" name="maps">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Nama Kategori</label>
            <select class="form-control" name="nama_kategori">
                <option value="">Pilih Kategori</option>
                    @foreach($kategori as $key => $value)
                <option value="{{ $value }}">{{ $value }}</option>
                    @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Deskripsi Singkat</label>
            <input type="text" class="form-control" name="deskripsi_singkat">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Deskripsi </label>
            <textarea type="text" class="form-control" name="deskripsi"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Foto Slider</label>
            <input type="file" class="form-control mt-3" name="foto_slider">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Foto Sampul</label>
            <input type="file" class="form-control mt-3" name="foto_sampul">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Foto Child 1</label>
            <input type="file" class="form-control mt-3" name="foto_child1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Foto Child 2</label>
            <input type="file" class="form-control mt-3" name="foto_child2">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Foto Child 3</label>
            <input type="file" class="form-control mt-3" name="foto_child3">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Harga</label>
            <input type="number" class="form-control mt-3" name="range_harga">
        </div>
        <div>
            <button class="btn btn-primary mt-5" style="margin-top:10px;width:100%" type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection