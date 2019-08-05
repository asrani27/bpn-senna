@extends('layouts.back.master')

@push('add_css')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{url('LTE/bower_components/select2/dist/css/select2.min.css')}}">
@endpush

@section('content')

      <div class="box box-primary">
                <!-- /.box-header -->
                <div class="box-body">    
                <form method="POST" action="{{route('cariberkas')}}">  
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Cari Berkas</label>
                    <div class="col-sm-8">
                      <select id="berkas" class="form-control select2" style="width: 100%;" name="berkas_id">
                            @foreach ($berkas as $s)
                                <option value="{{$s->id}}">{{$s->nomor}} / {{$s->pemohon->nama}}</option>
                            @endforeach
                      </select>
                    </div>
                    <div class="col-sm-2">
                      <button class="btn btn-sm btn-primary" type=submit>Search</button>
                      <a href="{{route('home')}}" class="btn btn-sm btn-primary">Semua</a>
                    </div>
                  </div>
                </form>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Jalur Direction : Mulai</label>
                    <div class="col-sm-3">
                      <select id="berkas" class="form-control select2" style="width: 100%;" name="berkas_id">
                                <option value="{{$s->id}}" selected>Lokasi Saya</option>
                      </select>
                    </div>
                    <label class="col-sm-1 control-label">Tujuan</label>
                    <div class="col-sm-3">
                      <select id="berkas" class="form-control select2" style="width: 100%;" name="berkas_id">
                            @foreach ($berkas as $s)
                                <option value="{{$s->id}}">{{$s->nomor}} / {{$s->pemohon->nama}}</option>
                            @endforeach
                      </select>
                    </div>
                      <a href="{{route('direction')}}" class="btn btn-sm btn-primary">Jalur Direction</a>
                  </div>
                </div>
      </div>

  <div class="box box-primary">
      <div class="box-body">    
          <div style="width: 100%; height: 500px;" id="mapper">
            {!! Mapper::render() !!}
          </div>   
      </div>
  </div>
@endsection

@push('add_js')
<script>
$(function () {
  //Initialize Select2 Elements
  $('.select2').select2()
})
</script>
@endpush