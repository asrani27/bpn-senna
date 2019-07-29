@extends('layouts.back.master')

@section('content')
<div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-info"></i> Petugas</h4>
    Adalah Halaman Untuk membuat data Petugas ukur
</div>

<div class="row">
  <div class="col-md-6">
  <a href="{{route('addPetugas')}}" class="btn btn-primary">Tambah</a><br /><br />
  </div>
</div>
      <div class="box box-primary">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>NIK</th>
                      <th>Nama Petugas</th>
                      <th>J.kel</th>
                      <th>alamat</th>
                      <th>telp</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <?php
                    $no = 1;
                    ?>
                    <tbody>
                      @foreach ($data as $dt)
                        <tr>
                        <td>{{$no++}}</td>
                        <td>{{$dt->nik}}</td>
                        <td>{{$dt->nama}}</td>
                        <td>{{$dt->jkel}}</td>
                        <td>{{$dt->alamat}}</td>
                        <td>{{$dt->telp}}</td>
                        <td>
                          <a href={{url("petugas/edit/{$dt->id}")}} class="btn btn-xs btn-success"><i class="fa fa-edit"></i> </a>
                          <a href={{url("petugas/delete/{$dt->id}")}} class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data Ini..?');"><i class="fa fa-trash"></i> </a>
                          
                        </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
      </div>
  </div>
@endsection

@push('add_js')
<script type="text/javascript">
$(document).ready(function() {
  $(document).on('click', '.add-akun', function() {
      $('#namapemohon').val($(this).data('nama'));
      $('#idpemohon').val($(this).data('id'));
      document.getElementById("inputEmail3").value = "";
      document.getElementById("inputPassword3").value = "";
      $('#addUser').modal('show');
  });
});
</script>

@endpush
