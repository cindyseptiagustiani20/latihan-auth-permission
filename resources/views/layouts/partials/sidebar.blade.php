<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{route('dashboard')}}">
        <i class="mdi mdi-grid-large menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item nav-category">Master Data</li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon mdi mdi-floor-plan"></i>
        <span class="menu-title">Master Data</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          @if(auth()->user()->role == 'superadmin')
          <li class="nav-item"> <a class="nav-link" href="{{route('user')}}">Data User</a></li>
          @else
          <li class="nav-item"> <a class="nav-link" href="{{route('tunjangan')}}">Data Tunjangan</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('potongan')}}">Data Potongan</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('jabatan')}}">Data Jabatan</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('PKP')}}">Data PKP</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('PTKP')}}">Data PTKP</a></li>
          @endif
        </ul>
      </div>
    </li>
    @if(auth()->user()->role != 'superadmin')
    <li class="nav-item">
      <a class="nav-link" href="{{route('pegawai')}}">
        <i class="menu-icon mdi mdi-contacts menu-icon"></i>
        <span class="menu-title">Data Pegawai</span>
      </a>
    </li>
    @endif
  </ul>
</nav>