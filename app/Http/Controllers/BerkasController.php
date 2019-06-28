<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berkas;
use App\Kelurahan;
use App\Instansi;
use App\Kecamatan;
use App\Pemohon;
use Alert;
use Auth;

class BerkasController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Berkas::all();
        return view('berkas.index',compact('data'));
    }

    public function add()
    {
        $pemohon = Pemohon::all();
        $kelurahan = Kelurahan::all();
        $instansi = Instansi::all();
        $kecamatan = Kecamatan::all();
        return view('berkas.add',compact('pemohon','kelurahan','instansi','kecamatan'));
    }

    public function store(Request $req)
    {
        $cekNomor = Berkas::where('nomor', $req->nomor)->first();
        if($cekNomor == null)
        {
            Berkas::create($req->all());
            Alert::Success('Senna', 'Berhasil Disimpan');
        }
        else {
            Alert::error('Senna', 'Nomor Berkas Sudah Ada');
        }
        return redirect('/berkas');
    }

    public function update(Request $req, $id)
    {
        $d = Berkas::find($id);
        $d->fill($req->all());
        $d->save();
        Alert::Success('Senna', 'Berhasil DiUpdate');
        return redirect('/berkas');
    }
    public function delete($id)
    {
        try {
            $d = Berkas::find($id);
            $d->delete();
            Alert::Success('Senna', 'Berhasil Di hapus');
        }
        catch(\Exception $e) {
            Alert::error('Senna', 'Tidak Bisa Di Hapus! Ada Data Pemohon Yang Terkait dengan Agama Ini');
        }
        return back();
    }

    public function edit($id)
    {
        $d = Berkas::find($id); 
        $pemohon = Pemohon::all();
        $kelurahan = Kelurahan::all();
        $instansi = Instansi::all();
        $kecamatan = Kecamatan::all();
        
        return view('berkas.edit',compact('pemohon','kelurahan','instansi','kecamatan','d'));
    }
}
