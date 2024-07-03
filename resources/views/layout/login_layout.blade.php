<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Akun Premium</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');
    </style>
</head>
<body style="font-family: 'Plus Jakarta Sans', sans-serif !important">
<h1 style="padding-top: 200px;
    margin: 0;color:#ff6f2c" class="text-center"> Login Akun Premium WeComeSee</h1>
    @yield('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/data_peminjam.js')}}"></script>

</body>
</html>