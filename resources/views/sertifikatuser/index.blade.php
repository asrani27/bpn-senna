@extends('layouts.back.master')

@section('content')
<div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-info"></i> Tanah Bersertifikat</h4>
    Adalah Halaman Untuk melihat daftar tanah yang telah bersertifikat
</div>

<div class="row">
  <div class="col-md-6">
  </div>
</div>
      <div class="box box-primary">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Instansi</th>
                      <th>No HAK Pakai</th>
                      <th>Kecamatan</th>
                      <th>Kelurahan</th>
                    </tr>
                    </thead>
                    <?php
                    $no = 1;
                    ?>
                    <tbody>
                      @foreach ($data as $dt)
                        <tr>
                        <td>{{$no++}}</td>
                        <td>{{$dt->berkas->instansi->nama}}</td>
                        <td>{{$dt->no_hak_pakai}}</td>
                        <td>{{$dt->berkas->kelurahan->kecamatan->nama}}</td>
                        <td>{{$dt->berkas->kelurahan->nama}}</td>
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
