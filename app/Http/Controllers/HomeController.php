<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use Carbon\Carbon;
use Alert;
use App\Berkas;
use App\Status;
use Mapper;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Mapper::map(-3.798144, 114.747211, ['zoom' => 14, 'marker' => false, 'gestureHandling' => 'greedy', 'scrollWheelZoom' => false]);
        $berkas = Berkas::all();
        $status = Status::all();
        $map = $berkas->map(function($item)use($status){
            if($item->status_id == null)
            {
                $item->icon = $status->first()->icon;
                $item->status = '-';
            }
            else
            {
                $item->icon = $item->status->icon;
                $item->status = $item->status->nama_status;
            }
            return $item;
        });

        foreach($map as $b)
        {
            Mapper::informationWindow($b->lat, $b->long, 
            "Nomor : {$b->nomor} <br>
            Nama : {$b->pemohon->nama} <br>
            Luas : {$b->luas} <br>
            Status : {$b->status} <br>
            <img src='http://localhost:8000/storage/{$b->foto}' width='100px'>
            ", 
            ['icon' => $b->icon,
            'open' => false, 
            'maxWidth'=> 300, 
            'markers' => 
                ['title' => 'Title', 'autoClose' => true]
            ]
            );
        }
        
        return view('home',compact('berkas'));
    }

    public function delete($id)
    {
        $data = Agenda::find($id);
        $data->delete();
        Alert::success('Diskominfo','Berhasil Di Hapus');
        return back();
    }

    public function edit($id)
    {
        $data = Agenda::find($id);
        return view('editagenda',compact('data'));
    }

    public function update(Request $req, $id)
    {
        $tanggal = Carbon::parse($req->tanggal)->format('Y-m-d');

        $s = Agenda::find($id);
        $s->nama_tamu   = $req->nama_tamu;
        $s->jumlah_tamu = $req->jumlah_tamu;
        $s->tanggal     = $tanggal;
        $s->jam         = $req->jam;
        $s->instansi    = $req->instansi;
        $s->telp        = $req->telp;
        $s->keperluan   = $req->keperluan;
        $s->save();
        
        Alert::success('Diskominfotik', 'Berhasil Diupdate');
        return redirect('/home');
    }
}
