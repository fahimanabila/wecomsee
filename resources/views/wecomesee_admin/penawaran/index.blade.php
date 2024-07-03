@extends('layout.master')
@section('content')
<div style="margin-top:30px" class="container">
<div style="width:100%">

</div>
    <div class="card">
        <div class="card-body">
            <h2> Data Penawaran </h2>

            @include('_partial/flash_message')

            <form action="{{ route('data_penawaran.search') }}" method="get">
                @csrf
                <input type="text" class="form-control" name="kata" placeholder="Cari Email...">
            </form>
            <table id="peminjam" class="table">
            <thead>
                <tr>
                <th scope="col">No. </th>
                <th scope="col">#ID</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Email</th>
                <th scope="col">Nomor Telepon</th>
                <th scope="col">Timestamp</th>
                <th scope="col">Konfirmasi</th>
                </tr>
            </thead>
            <tbody>
                    @if(!empty($data_penawaran))
                        <?php 
                        $no=1;foreach($data_penawaran as $data):?>
                        
                        <tr>
                            <th scope="row">{{ $no; }}</th>
                            <td>{{ $data-> id }}</td>
                            <td>{{ $data-> nama_lengkap }}</td>
                            <td><a href="mailto:{{ $data-> email }}" target="_blank"> {{ $data-> email }} </a></td>
                            <td><a href="https://wa.me/{{ $data-> nomor_telpon }}" target="_blank"> {{ $data-> nomor_telepon }} </a></td>
                            <td>{{ $data-> timestamp }}</td>
                            <td>@if ($data->flag == 'P')
                                <a href="{{ route('data_penawaran.konfirmasi', $data->id) }}" class="btn btn-success btn-sm">Konfirmasi</a>
                                @elseif ($data->flag == 'Y')
                                <span class="text-success"> Penawaran Terkirim </span>
                                @endif
                            </td>
                        </tr>
                        <?php $no++;endforeach ?>
                    @else
                    <p>Data penawaran kosong.</p>
                    @endif
                </tbody>
            </table>

            <div class="pull-left">
                <strong>
                    Jumlah data : {{ $jumlah_penawaran }}
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