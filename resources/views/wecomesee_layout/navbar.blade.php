<body>
    <header class="container">
        <a href="{{ url('') }}" class="logo">
            <img src="{{asset('ww')}}/img/logo-wecomesee.png" alt="logo">
        </a>
        <form method="GET" action="{{ route('wecomesee.filter') }}" class="nosubmit">
            <input name="keyword" type="search" id="cari_destinasi" class="nosubmit" placeholder="Cari apapun disini...">
        </form>
        <nav>
            <div class="dropdown">
            <a onclick="myFunction()" name="fitur" href="#superapp" class="dropbtn list">
                <?xml version="1.0" ?>
                <svg style="margin-top: 7px;margin-right: 5px;" height="25" viewBox="0 0 48 48" width="25" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 0h48v48h-48z" fill="none"/>
                    <path fill="#9A9EA6" d="M23.99 4c-11.05 0-19.99 8.95-19.99 20s8.94 20 19.99 20c11.05 0 20.01-8.95 20.01-20s-8.96-20-20.01-20zm13.85 12h-5.9c-.65-2.5-1.56-4.9-2.76-7.12 3.68 1.26 6.74 3.81 8.66 7.12zm-13.84-7.93c1.67 2.4 2.97 5.07 3.82 7.93h-7.64c.85-2.86 2.15-5.53 3.82-7.93zm-15.48 19.93c-.33-1.28-.52-2.62-.52-4s.19-2.72.52-4h6.75c-.16 1.31-.27 2.64-.27 4 0 1.36.11 2.69.28 4h-6.76zm1.63 4h5.9c.65 2.5 1.56 4.9 2.76 7.13-3.68-1.26-6.74-3.82-8.66-7.13zm5.9-16h-5.9c1.92-3.31 4.98-5.87 8.66-7.13-1.2 2.23-2.11 4.63-2.76 7.13zm7.95 23.93c-1.66-2.4-2.96-5.07-3.82-7.93h7.64c-.86 2.86-2.16 5.53-3.82 7.93zm4.68-11.93h-9.36c-.19-1.31-.32-2.64-.32-4 0-1.36.13-2.69.32-4h9.36c.19 1.31.32 2.64.32 4 0 1.36-.13 2.69-.32 4zm.51 11.12c1.2-2.23 2.11-4.62 2.76-7.12h5.9c-1.93 3.31-4.99 5.86-8.66 7.12zm3.53-11.12c.16-1.31.28-2.64.28-4 0-1.36-.11-2.69-.28-4h6.75c.33 1.28.53 2.62.53 4s-.19 2.72-.53 4h-6.75z"/></svg>
                    <span> Bahasa Indonesia  </span>
                    <svg style="margin-top: 15px;margin-left: 10px;" xmlns="http://www.w3.org/2000/svg" width="20" height="10"><path fill="none" stroke="#9A9EA6" stroke-width="3" d="M1 1l8 8 8-8"></path></svg></a>
                <div id="myDropdown" class="dropdown-content">
                    <a class="list" name="sbs" href="#translate" >Translate Website</a>
                </div>
            </div>

            <div class="dropdown2">
            <a onclick="myFunction2()" class="dropbtn2" style="margin-left:20px"><img src="{{asset('ww')}}/img/wecomesee-avatar.png"></a>
                <div id="myDropdown2" class="dropdown-content2">
                    @if (Auth::check())

                        <a href="#"> {{ '@'. Auth::user()->name }} </a>
                        @if (Auth::check() && Auth::user()->level == 'admin')
                        <a href="{{ url('dashboard') }}"> Administrator Area</a>
                        @endif
                        <form method="POST" action="{{route('logout')}}">
                        @csrf
                            <button style="border:none;color:#535151" type="submit"><i class="fas fa-sign-out-alt"></i> Log out</button>
                        </form>

                    @else
                    <a href="{{ url('register_user') }}"><i class="fas fa-user-alt"></i> Ajukan Akun</a>
                    <a href="{{ url('login') }}"><i class="fas fa-sign-in-alt"></i> Login </a>
                    @endif

                    

                </div>
            </div>
        </nav>
        <button class="btn-toggle-nav">
            <i class="fas fa-bars"></i>
        </button>
    </header>

    <div class="bg-nav-mobile">
        <div class="nav-mobile">
            <div class="head-nav-mobile">
                <button class="close-nav-mobile">
                    <i class="fas fa-times"></i>
                </button>                
            </div>
            <div class="menu-nav-mobile">
                <a class="list" href="#beranda" >Beranda</a>
            </div>
        </div>
    </div>

    <div class="crumbs container">
        <div class="text-crumbs">
            <p id="kategori">
                
            </p>
        </div>
    </div>