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
    <title name="title">WeComeSee : Login Aplikasi</title>
</head>
<body>
    <header class="container-native">
        <a href="index.html" class="logo">
            <img src="{{asset('ww')}}/img/favicon.png" alt="logo">
        </a>
    </header>

    <div class="hero container-native">
        <div class="login-head">
        </div>
        <div class="login-box">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h2>Login</h2>
                <span>Email</span>
                <input placeholder="Email..." type="text" name="email" id="email">
                <span style="font-size:12px;" id="result"></span>
                <span>Password</span>
                <input placeholder="Password..." type="password" name="password" id="password">
                <button type="submit" class="login-button">Sign In</button>
                <a href="{{ url('register_user') }}">Daftar Akun</a>
                <a href="{{ url('forgot_password') }}">Lupa Password</a>
            </form>
        </div>
    </div>
</body>
</html>