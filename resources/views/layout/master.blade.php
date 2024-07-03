<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator WeComeSee</title>
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');
    </style>
</head>
<body style="font-family: 'Plus Jakarta Sans', sans-serif !important">
    @include('layout.header')
    @include('layout.navbar')
    @yield('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/data_peminjam.js')}}"></script>
    <script>
        $(document).ready(function(){
            
            $.ajax({
                type: 'get',
                url: 'https://api.goapi.id/v1/regional/kecamatan?kota_id=33.74&api_key=RhRnKsEtWzjvnQeD0xWusEshAMaImX',
                success: function(result) {
                    $('#kecamatan').html('<option value=""> Pilih Kecamatan </option>');
                    $.each(result.data, function (i, item) {
                        $('#kecamatan').append(`<option nama="${item.name}" value="${item.id}">${item.name}</option>`);
                    });
                },
            });
        })

        function cariKelurahan(){
            var id_kecamatan = $('#kecamatan').val();
            var nama_kecamatan = $('#kecamatan option:selected').attr('nama');
            $('#nama_kecamatan').val(nama_kecamatan);

            $.ajax({
                type: 'get',
                url: 'https://api.goapi.id/v1/regional/kelurahan?kecamatan_id='+id_kecamatan+'&api_key=RhRnKsEtWzjvnQeD0xWusEshAMaImX',
                success: function(result) {
                    $('#kelurahan').html('<option value=""> Pilih Kelurahan </option>');
                    $.each(result.data, function (i, item) {
                        $('#kelurahan').append(`<option nama="${item.name}" value="${item.id}">${item.name}</option>`);
                    });
                },
            });
        }

        function isiKelurahan(){
            var nama_kecamatan = $('#kelurahan option:selected').attr('nama');
            $('#nama_kelurahan').val(nama_kecamatan);
        }


    </script>
</body>
</html>