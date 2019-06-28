<html><head>
    <link rel="stylesheet" type="text/css" href="{{url('LTE/stylepdf.css')}}">
	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
</head><body>

    <h2 class="text-center"><b class="text-primary">Aplikasi BPN SENNA</b></h2>   
<h4>Laporan Semua Data Pemohon</h4>
    <table class="table1" >
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>J Kel</th>
            <th>Tgl Lahir</th>
            <th>Tempat Lahir</th>
            <th>Alamat</th>
            <th>Kelurahan</th>
            <th>Pekerjaan</th>
        </tr>
        <?php
                $no = 1;
                ?>
                  @foreach ($data as $dt)
                    <tr>
                    <td>{{$no++}}</td>
                    <td>{{$dt->nik}}</td>
                    <td>{{$dt->nama}}</td>
                    <td>{{$dt->jkel}}</td>
                    <td>{{Carbon\Carbon::parse($dt->tgl_lahir)->format('d-M-Y')}}</td>
                    <td>{{$dt->tempat_lahir}}</td>
                    <td>{{$dt->alamat}}</td>
                    <td>{{$dt->kelurahan->nama}}</td>
                    <td>{{$dt->pekerjaan}}</td>
                    </tr>
                  @endforeach
    </table>	
</body>
<script>
	$( document ).ready(function() {
		  window.print();
	});
    </script></html>