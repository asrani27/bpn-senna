<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;
use App\Pemohon;
use App\Berkas;

class PdfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pemohon(Request $request)
    {
        $tglmulai = $request->tgl_mulai;
        $explode  = explode('/', $tglmulai);
        $month    = $explode[0];
        $day      = $explode[1];
        $year     = $explode[2];
        $extglmulai = ($year."-".$month."-".$day);
    
        $tglakhir   = $request->tgl_akhir;
        $explode    = explode('/', $tglakhir);
        $month      = $explode[0];
        $day       = $explode[1];
        $year       = $explode[2];
        $extglakhir = ($year."-".$month."-".$day);
    
        $no   = rand(0,10000);
        $tgl  = Carbon::now()->format('d M Y');
        $data = Pemohon::whereBetween('created_at', array($extglmulai, $extglakhir))->get();
        $pdf  = PDF::loadView('pdf.pdfpemohon', compact('data','tglmulai','tglakhir'))->setPaper('f4', 'landscape');
        return view('pdf.pdfpemohon',compact('data','tglmulai','tglakhir'));
        //return $pdf->download($no.'pdfreport'.date("Y-m-D-H:m:s").'.pdf');
    }

    public function pemohonAll()
    {
        $no   = rand(0,10000);
        $data = Pemohon::all();
        $pdf  = PDF::loadView('pdf.pdfpemohonall', compact('data'))->setPaper('f4', 'landscape');
        return view('pdf.pdfpemohonall',compact('data'));
        //return $pdf->download($no.'pdfreport'.date("Y-m-D-H:m:s").'.pdf');
    }

    public function berkas(Request $request)
    {
        $tglmulai = $request->tgl_mulai;
        $explode  = explode('/', $tglmulai);
        $month    = $explode[0];
        $day      = $explode[1];
        $year     = $explode[2];
        $extglmulai = ($year."-".$month."-".$day);
    
        $tglakhir   = $request->tgl_akhir;
        $explode    = explode('/', $tglakhir);
        $month      = $explode[0];
        $day       = $explode[1];
        $year       = $explode[2];
        $extglakhir = ($year."-".$month."-".$day);
        $no   = rand(0,10000);
        $tgl  = Carbon::now()->format('d M Y');
        $data = Berkas::whereBetween('created_at', array($extglmulai, $extglakhir))->get();
        $pdf  = PDF::loadView('pdf.pdfberkas', compact('data','tglmulai','tglakhir'))->setPaper('f4', 'landscape');
        return view('pdf.pdfberkas',compact('data','tglmulai','tglakhir'));
        //return $pdf->download($no.'pdfreport'.date("Y-m-D-H:m:s").'.pdf');
    }

    public function agendaToday()
    {
        $now = Carbon::now()->format('Y-m-d-h-i-s');
        $hariIni = Carbon::today()->format('d-M-Y');
        $today = Carbon::today()->format('Y-m-d');
        $data = Agenda::where('tanggal', $today)->get();
        $pdf = PDF::loadView('pdf.agendaToday', compact('data','hariIni'))->setPaper('f4', 'landscape');
        return $pdf->download($now.'agendaToday.pdf');
    }

    public function agendaMonth()
    {
        $now = Carbon::now()->format('Y-m-d-h-i-s');
        $bulanIni = Carbon::today()->format('M-Y');
        $now = Carbon::now();
        $month = $now->month;
        $year = $now->year;  
        $data = Agenda::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->get();
        $pdf = PDF::loadView('pdf.agendaMonth', compact('data','bulanIni'))->setPaper('f4', 'landscape');
        return $pdf->download($now.'agendaMonth.pdf');
    }

    public function pdf()
    {
        return view('pdf.pdf');
    }

    public function printpdf(Request $request)
    { 
        //dd($request->all());
        $tglmulai = $request->tgl_mulai;
        $explode  = explode('/', $tglmulai);
        $month    = $explode[0];
        $day      = $explode[1];
        $year     = $explode[2];
        $extglmulai = ($year."-".$month."-".$day);
    
        $tglakhir   = $request->tgl_akhir;
        $explode    = explode('/', $tglakhir);
        $month      = $explode[0];
        $day       = $explode[1];
        $year       = $explode[2];
        $extglakhir = ($year."-".$month."-".$day);
    
        $no   = rand(0,10000);
        $tgl  = Carbon::now()->format('d M Y');
        $data = Agenda::whereBetween('created_at', array($extglmulai, $extglakhir))->get();
        $pdf  = PDF::loadView('pdf.pdfperiode', compact('data','tglmulai','tglakhir'))->setPaper('f4', 'landscape');
        return $pdf->download($no.'pdfreport'.date("Y-m-D-H:m:s").'.pdf');
    }   
}
