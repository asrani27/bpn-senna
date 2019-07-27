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
<form class="form-horizontal" action="{{route('saveBerkas')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
          <div class="box-body">
            <br />
            <div class="form-group">
              <label class="col-sm-2 control-label">Nomor Berkas</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name="nomor" required value="B0{{$no_berkas}}" onkeypress="return hanyaAngka(event)" >
              </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">NIK Pemohon</label>
                <div class="col-sm-10">
                  <select id="agama" class="form-control select2" style="width: 100%;" name="pemohon_id" required>
                    <option value="" selected>--Pilih--</option>     
                    @foreach ($pemohon as $s)
                        <option value="{{$s->id}}">{{$s->nik}} / {{$s->nama}}</option>
                      @endforeach
                  </select>
                </div>
              </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Letak Tanah</label>
                <div class="col-sm-10">
                   <div id="mapHss" style="width:100%;height:500px;"> </div>
                </div>
            </div> 
            <div class="form-group">
                    <label class="col-sm-2 control-label">Latitude</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="lat" id="lat" required>
                    </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Longitude</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="long" id="long" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Luas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="luas" required>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Nama Instansi</label>
                <div class="col-sm-10">
                  <select id="jenis" class="form-control select2" style="width: 100%;" name="instansi_id">
                            <option value="" selected></option>    
                        @foreach ($instansi as $s)
                            <option value="{{$s->id}}">{{$s->nama}}</option>
                        @endforeach
                  </select>
                </div>
        </div>
            <div class="form-group">
                    <label class="col-sm-2 control-label">Kecamatan</label>
                    <div class="col-sm-10">
                      <select id="kecamatan" class="form-control select2" style="width: 100%;" onchange="dataDesa()">
                                <option value="" selected></option>    
                            @foreach ($kecamatan as $s)
                                <option value="{{$s->id}}">{{$s->nama}}</option>
                            @endforeach
                      </select>
                    </div>
            </div>
            <div class="form-group">
                    <label class="col-sm-2 control-label">Kelurahan/Desa</label>
                    <div class="col-sm-10">
                      <select id="kelurahan" class="form-control select2" style="width: 100%;" name="kelurahan_id" required>
                           
                      </select>
                    </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Peruntukan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="peruntukan" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Status</label>
                <div class="col-sm-10">
                      <select id="status" class="form-control select2" style="width: 100%;" required name="status">
                                <option value="" selected></option>    
                                @foreach ($status as $s)
                                    <option value="{{$s->id}}">{{$s->nama_status}}</option>
                                @endforeach
                      </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Keterangan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="keterangan">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Status Tunggakan</label>
                <div class="col-sm-10">
                      <select id="status" class="form-control select2" style="width: 100%;" required name="tunggakan">
                                <option value="tidak" selected>Tidak</option>
                                <option value="ya" selected>Ya</option>
                      </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Kawasan</label>
                <div class="col-sm-10">
                      <select id="status" class="form-control select2" style="width: 100%;" required name="kawasan">
                                
                                <option value="non pertanian" selected>Non Pertanian</option>
                                <option value="pertanian" selected>Pertanian</option>
                      </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Foto</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="foto">
                </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
             <a href={{url('/berkas')}} class="btn btn-sm btn-danger">Kembali</a>
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
  //alert(id);
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
<script>
var map;
var markers = [];

function initMap() {
  var mapHss = {lat: -3.31921, lng: 114.60292};

  map = new google.maps.Map(document.getElementById('mapHss'), {
    zoom: 15,
    center: mapHss,
    mapTypeId:google.maps.MapTypeId.ROADMAP,
    gestureHandling: 'greedy'
  });
  // This event listener will call addMarker() when the map is clicked.
  map.addListener('click', function(event) {

deleteMarkers();
          // get lat/lon of click
          var clickLat = event.latLng.lat();
          var clickLon = event.latLng.lng();

          // show in input box
          document.getElementById("lat").value = clickLat.toFixed(5);
          document.getElementById("long").value = clickLon.toFixed(5);
    addMarker(event.latLng);
  });

  // Adds a marker at the center of the map.
  addMarker(mapHss);
}

function stopTwoFingerWarning() {
$('.gm-style-pbc').hide();
$('.gm-style-pbc').css('display', 'none!important');    
}
// Adds a marker to the map and push to the array.
function addMarker(location) {
  var marker = new google.maps.Marker({
    position: location,
    map: map
  });
  markers.push(marker);
}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
  setMapOnAll(null);
}

// Shows any markers currently in the array.
function showMarkers() {
  setMapOnAll(map);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
  clearMarkers();
  markers = [];
}
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5r7K4yOYtenz85eB9rNIrNxLWKFBiHZE&callback=initMap">
</script>
@endpush
