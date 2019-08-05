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
      <li><a href="{{route('arsip')}}"><i class="fa fa-share"></i> Arsip</a></li>
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
          <li><a href="{{route('agama')}}"><i class="fa fa-circle"></i> Agama</a></li>
          <li><a href="{{route('petugas')}}"><i class="fa fa-circle"></i> Petugas</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-toggle-down"></i>
          <span>Laporan</span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('lap.ttdberkas')}}"><i class="fa fa-circle"></i>Tanda Terima Berkas</a></li>
          <li><a href="{{route('lap.cetakberkas')}}"><i class="fa fa-circle"></i>Cetak Berkas Untuk Pemohon</a></li>
          <li><a href="{{route('lap.berkas')}}"><i class="fa fa-circle"></i>Lap. Bulanan Berkas</a></li>
          <li><a href="{{route('lap.berkasselesai')}}"><i class="fa fa-circle"></i>Lap. Berkas Selesai</a></li>
          <li><a href="{{route('lap.tunggakan')}}"><i class="fa fa-circle"></i>Lap. Tunggakan Berkas</a></li>
          <li><a href="{{route('lap.bersertifikat')}}"><i class="fa fa-circle"></i>Lap. Tanah Bersertifikat</a></li>
          <li><a href="{{route('lap.petugasukur')}}"><i class="fa fa-circle"></i>Lap. Petugas Ukur</a></li>
          <li><a href="{{route('lap.arsip')}}"><i class="fa fa-circle"></i>Lap. Arsip</a></li>
          <li><a href="{{route('lap.nonpertanian')}}"><i class="fa fa-circle"></i>Lap. Kawasan Non Pertanian</a></li>
          <li><a href="{{route('lap.pertanian')}}"><i class="fa fa-circle"></i>Lap. Kawasan Pertanian</a></li>
          <li><a href="{{route('lap.instansi')}}"><i class="fa fa-circle"></i>Lap. Data Instansi</a></li>
          <li><a href="{{route('lap.pemohon')}}"><i class="fa fa-circle"></i>Lap. Data Pemohon</a></li>
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
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Cek Berkas</a></li>
      <li><a href="{{route('sertifikatuser')}}"><i class="fa fa-share"></i>Tanah Bersertifikat</a></li>
      <li><a href="{{route('logout')}}"><i class="fa fa-close"></i> Logout</a></li>
    </ul>
    @endif
  </section>
  <!-- /.sidebar -->
</aside>