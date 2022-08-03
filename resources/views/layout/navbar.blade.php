<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Sewa Buku</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @if (Auth::check() && Auth::user())
        <li class="nav-item">
          <a calss="nav-link" aria-current="page" href="{{ route('buku.index') }}">Data Buku</a>
        </li>
        @endif
        @if (Auth::check() && Auth::user()->level == 'admin')
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('data_peminjam.index')}}">Data Peminjaman</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('peminjaman.index')}}"> Transaksi Peminjaman</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('user.index') }}">User</a>
        </li>
        @endif
        <li class="nav-item">
          <a class="btn btn-danger btn-sm" href="{{ route('logout')}}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">{{_('Logout')}}</a>
            <form action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
        </li>
      </ul>
      <div>
        @if(Auth::check())
          <b>{{'Hai, '.Auth::user()->name }}</b>
          @else
          @endif
      </div>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>