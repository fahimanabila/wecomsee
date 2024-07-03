@extends('layout.master')
@section('content')
<div style="margin-top:30px" class="container">
<div style="width:100%">
@if (Auth::check() && Auth::user()->level == 'admin')
    <a style="margin-left:85%;margin-bottom:10px;" href="{{ route('data_destinasi.create') }}" class="btn btn-primary">
        Tambah Destinasi </a>
@endif
</div>
    <div class="card">
        <div class="card-body">
            <h2> Data Destinasi </h2>

            @include('_partial/flash_message')

            <form action="{{ route('data_destinasi.search') }}" method="get">
                @csrf
                <input type="text" class="form-control" name="kata" placeholder="Cari...">
            </form>
            <table id="peminjam" class="table">
            <thead>
                <tr>
                <th scope="col">No. </th>
                <th scope="col">#ID</th>
                <th scope="col">Nama Destinasi</th>
                <th scope="col">Area</th>
                <th scope="col">Alamat</th>
                <th scope="col">Link Maps</th>
                <th scope="col">Kategori</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Galeri</th>
                <th scope="col">Range Harga</th>
                <th scope="col">Edit</th>
                <th scope="col">Hapus</th>
                </tr>
            </thead>
            <tbody>
                    @if(!empty($data_destinasi))
                        <?php 
                        $no=1;foreach($data_destinasi as $data):?>
                        
                        <tr>
                            <th scope="row">{{ $no; }}</th>
                            <td>{{ $data-> id }}</td>
                            <td><a href="{{url('detail', $data-> id)}}"> {{ $data-> nama_destinasi }} </a> <br/> {{ $data-> nama_alias }}</td>
                            <td>Kel : {{ $data-> nama_kelurahan }} <br/>Kec : {{ $data-> nama_kecamatan }}</td>
                            <td>{{ $data-> alamat }}</td>
                            <td><a href="{{ $data-> maps }}" target="_blank">Link</a></td>
                            <td>{{ $data-> nama_kategori }}</td>
                            <td>{{ $data-> deskripsi }}</td>
                            <td>
                                <a class="btn btn-danger btn-sm mb-3" href="{{ asset('ww/img') }}/{{$data-> foto_slider }}" target="_blank">Slider</a><br/>
                                <a class="btn btn-warning btn-sm mb-3" href="{{ asset('ww/img') }}/{{ $data-> foto_sampul }}" target="_blank">Sampul</a><br/>
                                <a class="btn btn-success btn-sm mb-3" href="{{ asset('ww/img') }}/{{ $data-> foto_child1 }}" target="_blank">Child 1</a><br/>
                                <a class="btn btn-primary btn-sm mb-3" href="{{ asset('ww/img') }}/{{ $data-> foto_child2 }}" target="_blank">Child 2</a><br/>
                                <a class="btn btn-info btn-sm mb-3" href="{{ asset('ww/img') }}/{{ $data-> foto_child3 }}" target="_blank">Child 3</a><br/>
                            </td>
                            <td>{{ $data-> range_harga }}</td>
                            <td><a href="{{ route('data_destinasi.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
                            <td>
                                <form action="{{ route('data_destinasi.destroy', $data->id) }}" method="POST">
                                    @csrf
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <?php $no++;endforeach ?>
                    @else
                    <p>Data destinasi kosong.</p>
                    @endif
                </tbody>
            </table>

            <div class="pull-left">
                <strong>
                    Jumlah data : {{ $jumlah_destinasi }}
                </strong>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script>
$('span.z-0').remove();
</script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js">

@endsection