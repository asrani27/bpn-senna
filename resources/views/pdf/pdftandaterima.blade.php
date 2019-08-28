<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>TANDA TERIMA BERKAS</title>
<style type="text/css">
.auto-style1 {
	text-align: center;
}
</style>
	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
</head>

<body>

<h3 class="auto-style1">TANDA TERIMA BERKAS</h3>
<p><b>BIODATA :</b></p>
<table style="width: 100%">
	<tr>
		<td style="width: 191px">NIK</td>
		<td style="width: 22px">:</td>
		<td>{{$map->nik_pemohon}}</td>
	</tr>
	<tr>
		<td style="width: 191px">Nama Pemohon</td>
		<td style="width: 22px">:</td>
		<td>{{$map->nama_pemohon}}</td>
	</tr>
	<tr>
		<td style="width: 191px">Jenis Kelamin </td>
		<td style="width: 22px">:</td>
		<td>{{$map->jkel_pemohon}}</td>
	</tr>
	<tr>
		<td style="width: 191px">Tanggal Lahir</td>
		<td style="width: 22px">:</td>
		<td>{{$map->tgl_lahir_pemohon}}</td>
	</tr>
	<tr>
		<td style="width: 191px">Tempat Lahir</td>
		<td style="width: 22px">:</td>
		<td>{{$map->tempat_lahir_pemohon}}</td>
	</tr>
	<tr>
		<td style="width: 191px">Alamat</td>
		<td style="width: 22px">:</td>
		<td>{{$map->alamat_pemohon}}</td>
	</tr>
	<tr>
		<td style="width: 191px">&nbsp;</td>
		<td style="width: 22px">&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 191px">Peruntukan</td>
		<td style="width: 22px">:</td>
		<td>{{$map->peruntukan}}</td>
	</tr>
	<tr>
		<td style="width: 191px">Luas</td>
		<td style="width: 22px">:</td>
		<td>{{$map->luas}}</td>
	</tr>
	<tr>
		<td style="width: 191px">Kecamatan</td>
		<td style="width: 22px">:</td>
		<td>{{$map->kelurahan->kecamatan->nama}}</td>
	</tr>
	<tr>
		<td style="width: 191px">Kelurahan/ Desa</td>
		<td style="width: 22px">:</td>
		<td>{{$map->kelurahan->nama}}</td>
	</tr>
</table>

</body>

<script>
	$( document ).ready(function() {
		  window.print();
	});
    </script>
</html>
