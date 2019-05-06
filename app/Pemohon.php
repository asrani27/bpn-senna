<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemohon extends Model
{
    protected $table = 'pemohon';

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'agama_id');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id');
    }

    public function berkas()
    {
        return $this->hasMany(Berkas::class);
    }
}
