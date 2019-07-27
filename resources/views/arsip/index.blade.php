@extends('layouts.back.master')

@section('content')
<div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-info"></i> Arsip Berkas</h4>
    Adalah Halaman Untuk mengarsipkan berkas sertifikat tanah
</div>

<div class="row">
  <div class="col-md-6">
  <a href="{{route('addArsip')}}" class="btn btn-primary">Tambah</a><br /><br />
  </div>
</div>
      <div class="box box-primary">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Nomor Arsip</th>
                      <th>Nomor Berkas</th>
                      <th>Nama Instansi</th>
                      <th>No HAK Pakai</th>
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
                        <td>{{$dt->no_arsip}}</td>
                        <td>{{$dt->berkas->nomor}}</td>
                        <td>{{$dt->berkas->first()->instansi->nama}}</td>
                        <td>{{$dt->no_hak_pakai}}</td>
                        <td>
                          <a href={{url("arsip/edit/{$dt->id}")}} class="btn btn-xs btn-success"><i class="fa fa-edit"></i> </a>
                          <a href={{url("arsip/delete/{$dt->id}")}} class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data Ini..?');"><i class="fa fa-trash"></i> </a>
                        </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
  </div>

@endsection

@push('add_js')

</script>

@endpush
