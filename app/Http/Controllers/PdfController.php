<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;
use App\Pemohon;
use App\Petugas;
use App\Instansi;
use App\Berkas;
use App\Status;

use App\Arsip;
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

    public function bersertifikat()
    {
        $no   = rand(0,10000);
        $data = Arsip::all();
        //$pdf  = PDF::loadView('pdf.print_bersertifikat', compact('data'))->setPaper('f4', 'landscape');
        return view('pdf.print_bersertifikat',compact('data'));
        //return $pdf->download($no.'pdfreport'.date("Y-m-D-H:m:s").'.pdf');
    }

    public function arsip()
    {
        $no   = rand(0,10000);
        $data = Arsip::all();
        //$pdf  = PDF::loadView('pdf.print_bersertifikat', compact('data'))->setPaper('f4', 'landscape');
        return view('pdf.print_arsip',compact('data'));
        //return $pdf->download($no.'pdfreport'.date("Y-m-D-H:m:s").'.pdf');
    }

     public function tunggakan()
    {
        $berkas = Berkas::where('tunggakan', 'ya')->get();
        //dd($berkas);
        return view('pdf.print_tunggakan',compact('berkas'));
    }

     public function petugasukur()
    {
        $data = Berkas::all();
        return view('pdf.print_petugasukur',compact('data'));
    }


     public function nonpertanian()
    {
        $data = Berkas::where('kawasan', 'non pertanian')->get();
        //dd($data);
        return view('pdf.print_nonpertanian',compact('data'));
    }


     public function pertanian()
    {
        $data = Berkas::where('kawasan', 'pertanian')->get();
        return view('pdf.print_pertanian',compact('data'));
    }

     public function instansi()
    {
        $data = Instansi::all();
        return view('pdf.print_instansi',compact('data'));
    }

    public function berkasselesai(Request $req)
    {
        $no   = rand(0,10000);
        $berkas = Berkas::where('status_id', $req->status_id)->get();
        $data = $berkas->map(function($item){
            $item->nama_status = $item->status->nama_status;
            return $item;
        });

        //dd($data);
        //$pdf  = PDF::loadView('pdf.print_bersertifikat', compact('data'))->setPaper('f4', 'landscape');
        return view('pdf.print_berkasselesai',compact('data'));
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
        $data = Berkas::whereBetween('created_at', array($extglmulai.' 00:00:00', $extglakhir.' 23:59:59'))->get();
        $pdf  = PDF::loadView('pdf.pdfberkas', compact('data','tglmulai','tglakhir'))->setPaper('f4', 'landscape');
        return view('pdf.pdfberkas',compact('data','tglmulai','tglakhir'));
        //return $pdf->download($no.'pdfreport'.date("Y-m-D-H:m:s").'.pdf');
    }

    public function cetakberkas(Request $request)
    {
        $no   = rand(0,10000);
        $tgl  = Carbon::now()->format('d M Y');
        $data = Berkas::where('id',$request->id_berkas)->get();
        $map  = $data->map(function ($item){
            $item->nik_pemohon = $item->pemohon->nik;
            $item->nama_pemohon = $item->pemohon->nama;
            $item->jkel_pemohon = $item->pemohon->jkel;
            $item->tgl_lahir_pemohon = $item->pemohon->tgl_lahir;
            $item->tempat_lahir_pemohon = $item->pemohon->tempat_lahir;
            $item->alamat_pemohon = $item->pemohon->alamat;
            return $item;
        })->first();
        //dd($map);
        $pdf  = PDF::loadView('pdf.pdfcetakberkas', compact('map'));
        return view('pdf.pdfcetakberkas',compact('map','tglmulai','tglakhir'));
        //return $pdf->download($no.'pdfcetakberkas'.date("Y-m-D-H:m:s").'.pdf');
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
