@extends('layout.master')
@section('content')
<div style="margin-top:30px" class="container">
<div style="width:100%">
    <a style="margin-left:85%;margin-bottom:10px;" href="{{ route('data_user.create') }}" class="btn btn-primary">
        Tambah Data User </a>
</div>
    <div class="card">
        <div class="card-body">
            <h2> Data User </h2>

            @include('_partial/flash_message')

            <form action="{{ route('data_user.search') }}" method="get">
                @csrf
                <input type="text" class="form-control" name="kata" placeholder="Cari...">
            </form>
            <table id="peminjam" class="table">
            <thead>
                <tr>
                <th scope="col">No. </th>
                <th scope="col">#ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Level</th>
                <th scope="col">Edit</th>
                <th scope="col">Hapus</th>
                </tr>
            </thead>
            <tbody>
                    @if(!empty($user))
                        <?php 
                        // echo"<pre>";print_r($data_peminjam);exit();
                        $no=1;foreach($user as $data):?>
                        
                        <tr>
                            <th scope="row">{{ $no; }}</th>
                            <td>{{ $data-> id }}</td>
                            <td>{{ $data-> name }}</td>
                            <td>{{ $data-> email }}</td>
                            <td>{{ $data-> level }}</td>
                            <td><a href="{{ route('data_user.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
                            <td>
                                <form action="{{ route('data_user.destroy', $data->id) }}" method="POST">
                                    @csrf
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        
                        </tr>
                        <?php $no++;endforeach ?>
                    @else
                    <p>Data user kosong.</p>
                    @endif
                </tbody>
            </table>

            <div class="pull-left">
                <strong>
                    Jumlah user : {{ $jumlah_user }}
                </strong>
                <div class="col-md-6">
                <p>{{ $user->links() }}</p>
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