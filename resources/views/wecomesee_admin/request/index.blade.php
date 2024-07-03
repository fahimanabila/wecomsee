@extends('layout.master')
@section('content')
<div style="margin-top:30px" class="container">
<div style="width:100%">
@if (Auth::check() && Auth::user()->level == 'admin')
    <a style="margin-left:85%;margin-bottom:10px;" href="{{ route('data_request.create') }}" class="btn btn-primary">
        Tambah Request </a>
@endif
</div>
    <div class="card">
        <div class="card-body">
            <h2> Data Request </h2>

            @include('_partial/flash_message')

            <form action="{{ route('data_request.search') }}" method="get">
                @csrf
                <input type="text" class="form-control" name="kata" placeholder="Cari...">
            </form>
            <table id="peminjam" class="table">
            <thead>
                <tr>
                <th scope="col">No. </th>
                <th scope="col">#ID</th>
                <th scope="col">User ID</th>
                <th scope="col">Nama Pemesan</th>
                <th scope="col">Email/WA</th>
                <th scope="col">Pembayaran</th>
                <th scope="col">Service</th>
                <th scope="col">Note</th>
                <th scope="col">ACC</th>
                </tr>
            </thead>
            <tbody>
                    @if(!empty($data_request))
                        <?php 
                        $no=1;foreach($data_request as $data):?>
                        
                        <tr>
                            <th scope="row">{{ $no; }}</th>
                            <td>{{ $data-> id }}</td>
                            <td>{{ $data-> user_id }}</td>
                            <td>{{ $data-> nama_pemesan }}</td>
                            <td><a target="_blank" href="mailto:{{ $data-> email }}">{{ $data-> email }}</a><br/>
                                <a target="_blank" href="https://wa.me/{{ $data->nomor_telepon }}">{{ $data->nomor_telepon  }}</a>
                            </td>
                            <td>{{ $data-> nama_bank }} : {{ $data->no_rekening}}<br/><a target="_blank" href="{{asset('ww/img')}}/{{ $data->bukti_transfer}}">Lihat Bukti Transfer</a></td>
                            <td>{{ $data-> service }}</td>
                            <td>{{ $data-> note }}</td>

                            <td>@if ($data->flag == 'P')
                                <a href="{{ route('data_request.terima', $data->id) }}" style="width:150px;margin-bottom:10px;" class="btn btn-success btn-sm">Terima</a>
                                <a href="{{ route('data_request.tolak', $data->id) }}" style="width:150px" class="btn btn-danger btn-sm">Tolak</a>
                                @elseif ($data->flag == 'N')
                                <span class="text-danger"> Ditolak </span>
                                @elseif ($data->flag == 'Y')
                                <span class="text-success"> Diterima </span>
                                @endif
                            </td>
                        </tr>
                        <?php $no++;endforeach ?>
                    @else
                    <p>Data request kosong.</p>
                    @endif
                </tbody>
            </table>

            <div class="pull-left">
                <strong>
                    Jumlah data : {{ $jumlah_request }}
                </strong>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script>
</script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js">

@endsection