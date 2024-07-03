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
    <link rel="stylesheet" href="{{asset('ww')}}/css/style-login.css">
    <title name="title">iDompet : Login Demo Aplikasi</title>
</head>
<body>
    <header class="container-native">
        <a href="index.html" class="logo">
            <img src="{{asset('ww')}}/img/favicon.png" alt="logo">
        </a>
    </header>
    <div class="hero container-native" style="justify-content:center;width:100%;">
        <div class="login-box" style="margin:12% 0px;height: fit-content;">
            <form style="display:flex;flex-direction: column;">
                <h2>Reset Password</h2>
                <span>Email</span>
                <input placeholder="Masukkan email" type="email" name="email" id="email" style="font-family: 'Plus Jakarta Sans', sans-serif;color:#757D8A;margin: 10px 0px 20px 0px;padding:5px 10px;height:35px;width:100%;border-radius:5px;border:1px solid #E1E3E6;">
                <button type="button" onclick="showmodal()" class="login-button">Kirim Email Reset </button>
            </form>
        </div>
    </div>
</body>

<!-- The Modal -->
<div id="myModal" class="modalnih">
    <!-- Modal content -->
    <div class="modal-content-manual">
            <img style="width:30%;margin: auto" src="{{asset('ww')}}/img/idompet-alert-check.svg">
            <span style="font-family:'Plus Jakarta Sans';margin:30px 0px;">Email berhasil terkirim. <br/>Mohon cek email <br/>untuk mengganti password. </span>
            <button style="background-color: #023780;border: 1px solid #023780;" type="button" class="login-button close-manual">Kembali</button>
    </div>
</div>
<script src="{{asset('ww')}}/https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
window.location.replace('login.html');
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