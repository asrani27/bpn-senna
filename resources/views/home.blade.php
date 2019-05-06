@extends('layouts.back.master')

@push('add_css')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{url('LTE/bower_components/select2/dist/css/select2.min.css')}}">
@endpush

@section('content')

      <div class="box box-primary">
                <!-- /.box-header -->
                <div class="box-body">      
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nomor Berkas</label>
                    <div class="col-sm-8">
                      <select id="berkas" class="form-control select2" style="width: 100%;" name="berkas_id">
                            @foreach ($berkas as $s)
                                <option value="{{$s->id}}">{{$s->nomor}} / {{$s->pemohon->nama}}</option>
                            @endforeach
                      </select>
                    </div>
                    <div class="col-sm-2">
                      <button>Search</button>
                      <button>All</button>
                    </div>
                  </div>
                </div>
      </div>

  <div class="box box-primary">
      <div class="box-body">    
          <div style="width: 100%; height: 500px;">
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