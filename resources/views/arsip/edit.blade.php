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
<div class="box box-primary">
<form class="form-horizontal" action="{{route('updateArsip', $data->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
          <div class="box-body">
            <br />
            <div class="form-group">
              <label class="col-sm-2 control-label">Nomor Arsip</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name="no_arsip" required value="{{$data->no_arsip}}">
              </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Pilih Berkas </label>
                <div class="col-sm-10">
                  <select id="agama" class="form-control select2" style="width: 100%;" name="berkas_id" required>
                    <option value="" selected>--Pilih--</option>     
                      @foreach ($berkas as $s)
                        @if($s->id == $data->berkas_id)
                        <option value="{{$s->id}}" selected>{{$s->nomor}} / {{$s->instansi->nama}}</option>
                        @else
                        <option value="{{$s->id}}">{{$s->nomor}} / {{$s->instansi->nama}}</option>
                        @endif
                      @endforeach
                  </select>
                </div>
              </div>
            {{-- <div class="form-group">
                    <label class="col-sm-2 control-label">No HAK Pakai</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="no_hak_pakai" required>
                    </div>
            </div> --}}
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
             <a href={{url('/arsip')}} class="btn btn-sm btn-danger">Kembali</a>
          </div>
          <!-- /.box-footer -->
        </form>
</div>
@endsection


@push('add_js')

@endpush
