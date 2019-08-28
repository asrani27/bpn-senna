<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>DATA PEMOHON</title>
<style type="text/css">
.auto-style1 {
    text-align: center;
}
.auto-style2 {
    border-color: #000000;
    border-width: 0;
}
.auto-style3 {
    text-align: center;
    border-style: solid;
    border-width: 1px;
    background-color: #CECEC9;
}
.auto-style7 {
    border-style: solid;
    border-width: 1px;
}
.auto-style8 {
    font-size: large;
}
.auto-style9 {
    margin-left: 8px;
}
</style>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
</head>

<body>

<table style="width: 100%">
    <tr>
        <td width=5px><img alt="" height="79" src="{{url('LTE/LOGO.jpeg')}}" width="100" /></td>
        <td class="auto-style1"><strong><span class="auto-style8">BADAN 
        PERTANAHAN NASIONAL</span><br class="auto-style8" />
        <span class="auto-style8">KABUPATEN TANAH LAUT </span></strong><br />
        Jalan A. Syairani Komplek Perkantoran Gagas Kelurahan 
  Angsau Kecamatan Pelaihari 
Telp (0512) 21078.</td>
        <td>&nbsp;</td>
    </tr>
</table>
<hr />
<p class="auto-style1"><strong>Laporan Data Pemohon</strong></p>
<table align="left" cellpadding="3" cellspacing="0" class="auto-style2" style="width: 100%">
    <tr>
        <td class="auto-style3"><strong>No</strong></td>
        <td class="auto-style3"><strong>NIK</strong></td>
        <td class="auto-style3"><strong>Nama</strong></td>
        <td class="auto-style3"><strong>Jkel</strong></td>
        <td class="auto-style3"><strong>Tgl Lahir</strong></td>
        <td class="auto-style3"><strong>Tempat Lahir</strong></td>
        <td class="auto-style3"><strong>Alamat</strong></td>
        <td class="auto-style3"><strong>Kelurahan</strong></td>
        <td class="auto-style3"><strong>Pekerjaan</strong></td>
    </tr>
    <?php
    $no = 1;
    ?>
    @foreach($data as $dt)
    <tr>
                    <td class="auto-style7">{{$no++}}</td>
                    <td class="auto-style7">{{$dt->nik}}</td>
                    <td class="auto-style7">{{$dt->nama}}</td>
                    <td class="auto-style7">{{$dt->jkel}}</td>
                    <td class="auto-style7">{{Carbon\Carbon::parse($dt->tgl_lahir)->format('d-M-Y')}}</td>
                    <td class="auto-style7">{{$dt->tempat_lahir}}</td>
                    <td class="auto-style7">{{$dt->alamat}}</td>
                    <td class="auto-style7">{{$dt->kelurahan->nama}}</td>
                    <td class="auto-style7">{{$dt->pekerjaan}}</td>    </tr>
    @endforeach 
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<p class="auto-style9">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
<script>
    $( document ).ready(function() {
          window.print();
    });
</script>   
</body>

</html>
