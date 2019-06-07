<html><head>
    <link rel="stylesheet" type="text/css" href="{{url('LTE/stylepdf.css')}}">
</head><body>

    <h2 class="text-center"><b class="text-primary">Aplikasi BPN SENNA</b></h2>   
<h4>Laporan Data Berkas : Mulai {{$tglmulai}} sampai {{$tglakhir}}</h4>
    <table class="table1" >
        <tr>
            <th>No</th>
            <th>Nomor Berkas</th>
            <th>Nama Pemohon</th>
            <th>Kelurahan</th>
            <th>Luas</th>
            <th>Instansi</th>
            <th>Peruntukan</th>
            <th>Status</th>
            <th>Keterangan</th>
        </tr>
        <?php
                $no = 1;
                ?>
                  @foreach ($data as $dt)
                    <tr>
                    <td>{{$no++}}</td>
                    <td>{{$dt->nomor}}</td>
                    <td>{{$dt->pemohon->nama}}</td>
                    <td>{{$dt->kelurahan->nama}}</td>
                    <td>{{$dt->luas}}</td>
                    <td>{{$dt->instansi->jenis}}</td>
                    <td>{{$dt->peruntukan}}</td>
                    <td>{{$dt->status}}</td>
                    <td>{{$dt->keterangan}}</td>
                    </tr>
                  @endforeach
    </table>	
</body></html>