<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemohon;
use App\Kelurahan;
use App\Kecamatan;
use App\Agama;
use App\User;
use App\Role;
use Auth;
use Alert;
use Carbon\Carbon;

class PemohonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Pemohon::all();
        return view('pemohon.index',compact('data'));
    }

    public function add()
    {
        $selectKec = Kecamatan::all();
        $selectAga = Agama::all();
        return view('pemohon.add',compact('selectKec','selectAga'));
    }

    public function dataDesa($id)
    {
        $d = Kelurahan::where('kecamatan_id', $id)->get();
        return response()->json($d);
    }

    public function store(Request $req)
    {
        $cekNik = Pemohon::where('nik', $req->nik)->first();
        $tgl = Carbon::parse($req->tgl_lahir)->format('Y-m-d');
        if($cekNik == null)
        {
            $s = new Pemohon;
            $s->nik                   = $req->nik;
            $s->nama                  = $req->nama;
            $s->jkel                  = $req->jkel;
            $s->tgl_lahir             = $tgl;
            $s->tempat_lahir          = $req->tempat_lahir;
            $s->alamat                = $req->alamat;
            $s->kelurahan_id          = $req->kelurahan_id;
            $s->agama_id              = $req->agama_id;
            $s->pekerjaan             = $req->pekerjaan;
            $s->save();  
            Alert::success('Senna', 'Berhasil Di Simpan!');
        }
        else {
            Alert::error('Senna', 'NIK Sudah Ada');
        }
        return redirect('/pemohon');
    }

    public function edit($id)
    {
        $datas = Pemohon::where('id', $id)->get();
        $data = $datas->map(function($item, $key){
            $item->kecamatan_id = $item->kelurahan->kecamatan->id;
            return $item;
        })->first();
        $selectKec = Kecamatan::all();
        $selectAga = Agama::all();
        $selectKel = Kelurahan::where('kecamatan_id', $data->kecamatan_id)->get();
        return view('pemohon.edit',compact('data','selectKec','selectAga','selectKel'));
    }

    public function update(Request $req, $id)
    {
        $tgl = Carbon::parse($req->tgl_lahir)->format('Y-m-d');
        $s = Pemohon::find($id);
        $s->nik                   = $req->nik;
        $s->nama                  = $req->nama;
        $s->jkel                  = $req->jkel;
        $s->tgl_lahir             = $tgl;
        $s->tempat_lahir          = $req->tempat_lahir;
        $s->alamat                = $req->alamat;
        $s->kelurahan_id          = $req->kelurahan_id;
        $s->agama_id              = $req->agama_id;
        $s->pekerjaan             = $req->pekerjaan;
        $s->save();
        Alert::Success('Senna', 'Berhasil DiUpdate');
        return redirect('/pemohon');
    }

    public function delete($id)
    {
        try {
            $d = Pemohon::find($id);
            $d->delete();
            Alert::Success('Senna', 'Berhasil Di hapus');
        }
        catch(\Exception $e) {
            Alert::error('Senna', 'Tidak Bisa Di Hapus! Ada Data Berkas Terkait Pada Pemohon Ini');
        }
        return back();
    }

    public function storeAkun(Request $req)
    {
        $cek = User::where('email', $req->email)->first();
        $roleUser = Role::where('name','user')->first();
        if($cek == null)
        {
            //Save Akun pemohon
            $s = new User;
            $s->name = $req->name;
            $s->email = $req->email;
            $s->password = bcrypt($req->password);
            $s->save();
            $s->attachRole($roleUser);

            //Update User ID Pemohon
            $p = Pemohon::find($req->idpemohon);
            $p->user_id = $s->id;
            $p->save();

            Alert::success('Senna', 'Berhasil Disimpan');
        }
        else {
            Alert::error('Senna', 'Email Sudah Ada');
        }
        return back();
    }
}
