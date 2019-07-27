<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    protected $table = 'instansi';

    protected $fillable = ['kode', 'nama', 'jenis'];
    
    public function berkas()
    {
        return $this->hasMany(Berkas::class);
    }
}
