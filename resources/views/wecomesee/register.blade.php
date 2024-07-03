<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
	<meta name="description" content="">
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('ww')}}/img/favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('ww')}}/css/style-register.css">
    <title name="title">WeComeSee | Ajukan Akun! Tambah Destinasi</title>
</head>
<style>
    .alert-success{
        background: green;
        padding: 17px;
        margin-bottom: 20px;
        color: white;
    }
</style>
<body>
    <header class="container-native">
        <a href="{{ url('') }}" class="logo">
            <img src="{{asset('ww')}}/img/favicon.png" alt="logo">
        </a>
    </header>

    <div class="hero container-native" style="justify-content:center;width:100%;">
        <div class="login-box" style="margin-top:12%;">
        @include('_partial/flash_message')
            <form method="POST" action="{{ route('data_user.pengajuan') }}" style="display:flex;flex-direction: column;">
            @csrf
                <h2>Ajukan Akun WeComeSee</h2>
                <span>Username </span>
                <input type="text" name="name" id="name" placeholder="Ketik username..." required autofocus>
                <span>ID KTP</span>
                <input type="number" name="identitas_ktp" id="email" placeholder="Ketik No KTP..." required>
                <span>Email</span>
                <input type="email" name="email" id="email" placeholder="Ketik email..." required>
                <span>Kota Domisili</span>
                <select style="display:block" type="select" id="kota_domisili" name="kota_domisili">
                </select>
                <button type="submit" class="login-button">Kirim</button>
            </form>
        </div>
    </div>
</body>


<!-- The Modal -->
<div id="myModal" class="modalnih">
    <!-- Modal content -->
    <div class="modal-content-manual">
            <img style="width:30%;margin: auto" src="{{asset('ww')}}/img/idompet-alert-check.svg">
            <span style="font-family:'Plus Jakarta Sans';margin:30px 0px;">Pendaftaran berhasil. Silahkan login untuk menikmati fitur demo iDompet.</span>
            <button style="background-color: #023780;border: 1px solid #023780;" type="button" class="login-button close-manual">Balik ke Menu Utama</button>
    </div>
</div>

<!-- <script type="text/javascript" src="https://unpkg.com/@popperjs/core@2"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script rel="text/javascript" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-dropdown/2.0.3/jquery.dropdown.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<script type="text/javascript" src="plugin/dropdown/dist/js/bootstrap-multiselect.js"></script>

<script>
    $(document).ready(function(){
            
            $.ajax({
                type: 'get',
                url: 'https://api.goapi.id/v1/regional/kota?provinsi_id=33&api_key=RhRnKsEtWzjvnQeD0xWusEshAMaImX',
                success: function(result) {
                    $('#kota_domisili').html('<option value=""> Pilih Kota Domisili </option>');
                    $.each(result.data, function (i, item) {
                        $('#kota_domisili').append(`<option value="${item.name}">${item.name}</option>`);
                    });
                },
            });
        })
</script>
<script>

    function showmodal(){
        // Get the modal
        var modal = document.getElementById("myModal");
        
        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");
    
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close-manual")[0];
    
        modal.style.display = "block";
    
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modal.style.display = "none";
        location.replace('login.html')
        }
    
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        }
    }
    
</script>
</html>