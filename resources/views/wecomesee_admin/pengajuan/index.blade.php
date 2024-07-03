@extends('layout.master')
@section('content')
<div style="margin-top:30px" class="container">
<div style="width:100%">

</div>
    <div class="card">
        <div class="card-body">
            <h2> Data Pengajuan Akun Premium</h2>

            @include('_partial/flash_message')

            <form action="{{ route('data_pengajuan.search') }}" method="get">
                @csrf
                <input type="text" class="form-control" name="kata" placeholder="Cari Email...">
            </form>
            <table id="peminjam" class="table">
            <thead>
                <tr>
                <th scope="col">No. </th>
                <th scope="col">#ID</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Identitas KTP</th>
                <th scope="col">Kota Domisili</th>
                <th scope="col">Pengajuan Dibuat</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                    @if(!empty($data_pengajuan))
                        <?php 
                        $no=1;foreach($data_pengajuan as $data):?>
                        
                        <tr>
                            <th scope="row">{{ $no; }}</th>
                            <td>{{ $data-> id }}</td>
                            <td>{{ $data-> username }}</td>
                            <td><a href="mailto:{{ $data-> email }}" target="_blank"> {{ $data-> email }} </a></td>
                            <td>{{ $data-> identitas_ktp }}</td>
                            <td>{{ $data-> kota_domisili }}</td>
                            <td>{{ $data-> created_at }}</td>
                            <td>@if ($data->flag == 'P')
                                <a href="{{ route('data_pengajuan.konfirmasi', $data->id) }}" class="btn btn-success btn-sm">Konfirmasi</a>
                                @elseif ($data->flag == 'Y')
                                <span class="text-success"> Akun Terkirim </span>
                                @endif
                            </td>
                        </tr>
                        <?php $no++;endforeach ?>
                    @else
                    <p>Data Pengajuan kosong.</p>
                    @endif
                </tbody>
            </table>

            <div class="pull-left">
                <strong>
                    Jumlah data : {{ $jumlah_pengajuan }}
                </strong>
                <div class="col-md-6">
                <p>{{ $data_pengajuan->links() }}</p>
                </div>
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