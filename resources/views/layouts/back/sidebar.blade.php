<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    {{-- <div class="user-panel">
        <center><img src="{{url('LTE/logo1.png')}}" class="img" widht="60px" height="60px" alt="User Image"></center>
        <p>Administrator<br></p>
    </div> --}}
    <!-- sidebar menu: : style can be found in sidebar.less -->
    @if (Auth::user()->hasRole('admin'))
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU UTAMA</li>
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{route('berkas')}}"><i class="fa fa-share"></i> Ajukan Berkas</a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-toggle-down"></i>
          <span>Master Data</span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('pemohon')}}"><i class="fa fa-circle"></i> Pemohon</a></li>
          <li><a href="{{route('kecamatan')}}"><i class="fa fa-circle"></i> Kecamatan</a></li>
          <li><a href="{{route('kelurahan')}}"><i class="fa fa-circle"></i> Kelurahan / Desa</a></li>
          <li><a href="{{route('instansi')}}"><i class="fa fa-circle"></i> jenis Instansi</a></li>
          <li><a href="{{route('agama')}}"><i class="fa fa-circle"></i> Agama</a></li> </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-toggle-down"></i>
          <span>Laporan</span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('lap.berkas')}}"><i class="fa fa-circle"></i>Lap. Berkas</a></li>
          <li><a href="{{route('lap.pemohon')}}"><i class="fa fa-circle"></i>Lap. Pemohon</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-toggle-down"></i>
          <span>Setting</span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('status')}}"><i class="fa fa-circle"></i> Status</a></li>
          <li><a href="{{route('role')}}"><i class="fa fa-circle"></i> Roles</a></li>
          <li><a href="{{route('user')}}"><i class="fa fa-users"></i> Account</a></li>
        </ul>
      </li>
      <li><a href="{{route('logout')}}"><i class="fa fa-close"></i> Logout</a></li>
    </ul>
    @elseif(Auth::user()->hasRole('user'))
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU UTAMA</li>
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#"><i class="fa fa-share"></i>Berkas Saya</a></li>
      <li><a href="#"><i class="fa fa-share"></i>Profil Saya</a></li>
      <li><a href="{{route('logout')}}"><i class="fa fa-close"></i> Logout</a></li>
    </ul>
    @endif
  </section>
  <!-- /.sidebar -->
</aside>