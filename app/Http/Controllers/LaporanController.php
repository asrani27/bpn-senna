<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function pemohon()
    {
        return view('laporan.pemohon');
    }
    public function berkas()
    {
        return view('laporan.berkas');
    }
}
