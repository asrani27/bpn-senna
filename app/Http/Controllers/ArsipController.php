<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arsip;
use App\Berkas;
use Alert;
class ArsipController extends Controller
{
    public function index()
    {
    	$data = Arsip::all();
    	return view('arsip.index',compact('data'));
    }

    public function add()
    {
    	$berkas = Berkas::all();
    	return view('arsip.add',compact('berkas'));
    }

    public function store(Request $req)
    {
        $no_hak_pakai = Berkas::find($req->berkas_id)->no_hak_pakai;
    	$s = new Arsip;
    	$s->no_arsip = $req->no_arsip;
    	$s->no_hak_pakai = $no_hak_pakai;
    	$s->berkas_id = $req->berkas_id;
    	$s->save();
		Alert::Success('Senna', 'Berhasil Disimpan');
    	return redirect('arsip');
    }

    public function edit($id)
    {
        $data = Arsip::find($id);
        $berkas = Berkas::all();
        return view('arsip.edit',compact('data','berkas'));
    }

    public function update(Request $req, $id)
    {
        $no_hak_pakai = Berkas::find($req->berkas_id)->no_hak_pakai;
    	$s = Arsip::find($id);
    	$s->no_arsip = $req->no_arsip;
    	$s->no_hak_pakai = $no_hak_pakai;
    	$s->berkas_id = $req->berkas_id;
    	$s->save();
		Alert::Success('Senna', 'Berhasil DiUpdate');	
    	return redirect('arsip');
    }

    public function delete($id)
    {
        $data = Arsip::find($id)->delete();
        Alert::Success('Senna', 'Berhasil DiHapus');
        return back();
    }
}
