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
<form class="form-horizontal" action="{{route('savePetugas')}}" method="POST">
            {{ csrf_field() }}
          <div class="box-body">
            <br />
            <div class="form-group">
              <label class="col-sm-2 control-label">NIK </label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name="nik" required onkeypress="return hanyaAngka(event)" >
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Lengkap</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" required>
              </div>
            </div>

            <div class="form-group">
                    <label class="col-sm-2 control-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" style="width: 100%;" name="jkel">
                              <option value="L">Laki-laki</option>
                              <option value="P">Peremuan</option>
                      </select>
                    </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="alamat" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Telp</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="telp" required onkeypress="return hanyaAngka(event)" >
                </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
             <a href={{url('/petugas')}} class="btn btn-sm btn-danger">Kembali</a>
          </div>
          <!-- /.box-footer -->
        </form>
</div>
@endsection


@push('add_js')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<!-- Page script -->
<script>
    
function dataDesa()
{
  var e = document.getElementById("kecamatan");
  var id = e.options[e.selectedIndex].value;
  $.ajax({
            type: 'GET',
            url: 'dataDesa/' + id,
            success: function (response) {
                  var obj = response;
                    $('#kelurahan').find('option').remove().end();
                  $.each( obj, function( key, value ) {
                    var newOption = new Option(value.nama, value.id, false, false);
                    $('#kelurahan').append(newOption);
                  });
              }
    }); 
}

        $(function () {
          //Initialize Select2 Elements
          $('.select2').select2()
      
          //Date picker
          $('#datepicker').datepicker({
            autoclose: true
          })
      
          //Timepicker
          $('.timepicker').timepicker({
            showInputs: false,
            showMeridian: false     
          })
        })
      </script>
      <script>
          function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
             if (charCode > 31 && (charCode < 48 || charCode > 57))
       
              return false;
            return true;
          }
        </script>
@endpush
