<nav class="navbar navbar-expand-lg" style="background:#ff6f2c;color:white!important">
  <div class="container-fluid">
    <a class="navbar-brand" style="color:white" href="#">WeComeSee</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @if (Auth::check() && Auth::user())
        <li class="nav-item">
          <a style="color:white" class="nav-link" href="{{  url('data_destinasi') }}">Data Destinasi</a>
        </li>
        @endif
        @if (Auth::check() && Auth::user()->level == 'admin')
        <li class="nav-item">
          <a style="color:white" class="nav-link" href="{{  url('data_kategori') }}">Data Master Kategori</a>
        </li>
        <li class="nav-item">
          <a style="color:white" class="nav-link" href="{{  url('data_request') }}">Data Request Jasa</a>
        </li>
        <li class="nav-item">
          <a style="color:white" class="nav-link" href="{{  url('data_penawaran') }}">Data Penawaran</a>
        </li>
        <li class="nav-item">
          <a style="color:white" class="nav-link" href="{{  url('data_pengajuan') }}">Data Pengajuan</a>
        </li>
        <li class="nav-item">
          <a style="color:white" class="nav-link" href="{{  url('data_user') }}">Data User</a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="#">
          </a>
        </li>
      </ul>
      <div>
      
    @if(Auth::check())
    <b style="margin-right:20px;">{{ 'Hai, '. Auth::user()->name }}</b>
    @else
    @endif
  </div>
  <form action="{{route('logout')}}" method="POST">
            @csrf
              <button type="submit" class="btn btn-success btn-sm">Logout</button>
          </form>
    </div>
  </div>
</nav>