<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berkas;
use App\Kelurahan;
use App\Instansi;
use App\Kecamatan;
use App\Pemohon;
use App\Status;
use App\Upload;
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
        $berkas = Berkas::all();
        $status = Status::all();
        $data = $berkas->map(function($item)use($status){
            $item->status = $status->where('id',$item->status)->first()->nama_status;
            return $item;
        });
        return view('berkas.index',compact('data'));
    }

    public function add()
    {
        $pemohon = Pemohon::all();
        $status = Status::all();
        $kelurahan = Kelurahan::all();
        $instansi = Instansi::all();
        $kecamatan = Kecamatan::all();
        return view('berkas.add',compact('pemohon','kelurahan','instansi','kecamatan','status'));
    }

    public function store(Request $req)
    {
        $cekNomor = Berkas::where('nomor', $req->nomor)->first();
        if($req->hasFile('foto'))
        {
            $filename = $req->foto->getClientOriginalName();
            $req->foto->storeAs('/public',$filename);
            //dd($filename);
            if($cekNomor == null)
            {
                $s = new Berkas;
                $s->nomor        = $req->nomor;
                $s->pemohon_id   = $req->pemohon_id;
                $s->lat          = $req->lat;
                $s->long         = $req->long;
                $s->kelurahan_id = $req->kelurahan_id;
                $s->luas         = $req->luas;
                $s->instansi_id  = $req->instansi_id;
                $s->peruntukan   = $req->peruntukan;
                $s->status       = $req->status;
                $s->keterangan   = $req->peruntukan;
                $s->foto         = $filename;
                $s->save();
                Alert::Success('Senna', 'Berhasil Disimpan');
            }
            else {
                Alert::error('Senna', 'Nomor Berkas Sudah Ada');
            }
            return redirect('/berkas'); 
        }
        else
        {
            if($cekNomor == null)
            {
                Berkas::create($req->except('foto'));
                Alert::Success('Senna', 'Berhasil Disimpan');
            }
            else {
                Alert::error('Senna', 'Nomor Berkas Sudah Ada');
            }
            return redirect('/berkas');   
        }
    }

    public function update(Request $req, $id)
    {
        if($req->hasFile('foto'))
        {
            $filename = $req->foto->getClientOriginalName();
            $req->foto->storeAs('/public',$filename);
            //dd($filename);
                $s = Berkas::find($id);
                $s->nomor        = $req->nomor;
                $s->pemohon_id   = $req->pemohon_id;
                $s->lat          = $req->lat;
                $s->long         = $req->long;
                $s->kelurahan_id = $req->kelurahan_id;
                $s->luas         = $req->luas;
                $s->instansi_id  = $req->instansi_id;
                $s->peruntukan   = $req->peruntukan;
                $s->status       = $req->status;
                $s->keterangan   = $req->peruntukan;
                $s->foto         = $filename;
                $s->save();
                Alert::Success('Senna', 'Berhasil DiUpdate');
            return redirect('/berkas'); 
        }
        else
        {
            $d = Berkas::find($id);
            $d->fill($req->all());
            $d->save();
            Alert::Success('Senna', 'Berhasil DiUpdate');
            return redirect('/berkas');  
        }
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
        $status = Status::all();
        $kelurahan = Kelurahan::all();
        $instansi = Instansi::all();
        $kecamatan = Kecamatan::all();
        //dd($d);
        return view('berkas.edit',compact('pemohon','kelurahan','instansi','kecamatan','d','status'));
    }

    public function upload($id)
    {
        $data = Berkas::find($id);
        $foto = $data->upload;
        //dd($foto);
        //dd($berkas);
        return view('berkas.upload',compact('data','foto'));
    }

    public function uploadStore(Request $req, $id)
    {
         if($req->hasFile('file'))
        {
            $filename = $req->file->getClientOriginalName();
            $req->file->storeAs('/public/berkas',$filename);
                $s = new Upload;
                $s->judul      = $req->judul;
                $s->filename   = $filename;
                $s->berkas_id  = $id;
                $s->save();
            Alert::Success('Senna', 'Berhasil Di Upload');
            return back(); 
        }
    }

    public function uploadDelete($id)
    {
            $d = Upload::find($id);
            $d->delete();
            Alert::Success('Senna', 'Berhasil Di Hapus');
            return back(); 
    }
}
