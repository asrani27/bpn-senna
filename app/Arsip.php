<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    protected $table = 'arsip';

    public function berkas()
    {
    	return $this->belongsTo(Berkas::class);
    }
}
