<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Berkas;
use App\Status;

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

    public function cetakberkas()
    {
    	$berkas = Berkas::all();
        return view('laporan.cetakberkas',compact('berkas'));
    }

    public function ttdberkas()
    {
        $berkas = Berkas::all();
        return view('laporan.ttdberkas',compact('berkas'));
    }

    public function bersertifikat()
    {
        return view('laporan.bersertifikat');
    }

    public function arsip()
    {
        return view('laporan.arsip');
    }

    public function berkasselesai()
    {
        $status = Status::all();
        return view('laporan.berkasselesai',compact('status'));
    }

    public function tunggakan()
    {
        return view('laporan.tunggakan');
    }

    public function petugasukur()
    {
        return view('laporan.petugasukur');
    }

    public function nonpertanian()
    {
        return view('laporan.nonpertanian');
    }
    
    public function pertanian()
    {
        return view('laporan.pertanian');
    }

    public function instansi()
    {
        return view('laporan.instansi');
    }
}
