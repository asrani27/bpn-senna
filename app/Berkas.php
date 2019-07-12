<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    protected $table = 'berkas';

    protected $fillable = ['nomor', 'pemohon_id', 'lat', 'long', 'kelurahan_id', 'luas', 'instansi_id',
                            'peruntukan', 'status', 'keterangan','foto'];

    public function pemohon()
    {
        return $this->belongsTo(Pemohon::class);
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function instansi()
    {
        return $this->belongsTo(Instansi::class);
    }
}
