@extends('layouts.back.master')
@push('add_css')

  <!-- daterange picker -->
  <link rel="stylesheet" href="{{url('LTE/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{url('LTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{url('LTE/plugins/iCheck/all.css')}}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{url('LTE/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{url('LTE/plugins/timepicker/bootstrap-timepicker.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{url('LTE/bower_components/select2/dist/css/select2.min.css')}}">

@endpush
@section('content')

<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-info"></i> Laporan berkas Selesai</h4>
    Adalah Halaman Untuk Cetak Laporan Data berkas Yang Sudah Selesai.
</div>
<div class="box box-primary">
    <div class="box-body">
        <form method="POST" action="{{route('lap.berkasselesai.all')}}" target="_blank">
                {{ csrf_field() }}


            <div class="form-group">
                    <label class="col-sm-2 control-label">Pilih Berkas</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" style="width: 100%;" name="status_id">
                        @foreach($status as $b)
                          <option value="{{$b->id}}">{{$b->nama_status}}</option>
                        @endforeach
                      </select>
                    </div>
            </div>
    
            <button type="submit" class="btn btn-sm btn-primary">Print</button>
        </form>
    </div>
</div>
@endsection


@push('add_js')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<!-- Page script -->

@endpush
