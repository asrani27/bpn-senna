<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    protected $table = 'berkas';

    protected $fillable = ['nomor', 'pemohon_id', 'lat', 'long', 'kelurahan_id', 'luas', 'instansi_id',
                            'peruntukan', 'status_id', 'keterangan', 'tunggakan', 'foto', 'kawasan', 'petugas_id', 'no_hak_pakai'];

    public function pemohon()
    {
        return $this->belongsTo(Pemohon::class);
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function instansi()
    {
        return $this->belongsTo(Instansi::class);
    } 

    public function status()
    {
        return $this->belongsTo(Status::class);
    } 

    public function upload()
    {
        return $this->hasMany(Upload::class);
    }

    public function arsip()
    {
        return $this->hasMany(Arsip::class);
    } 
}
