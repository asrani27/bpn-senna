<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petugas;
use Alert;
class PetugasController extends Controller
{
    public function index()
    {
    	$data = Petugas::all();
    	return view('petugas.index',compact('data'));
    }

    public function add()
    {
    	return view('petugas.add');
    }

    public function edit($id)
    {
    	$data = Petugas::find($id);
    	return view('petugas.edit',compact('data'));
    }

    public function store(Request $req)
    {
    	$p = new Petugas;
    	$p->nik    = $req->nik;
    	$p->nama   = $req->nama;
    	$p->jkel   = $req->jkel;
    	$p->alamat = $req->alamat;
    	$p->telp   = $req->telp;
    	$p->save();
        Alert::Success('Senna', 'Berhasil Disimpan');
    	return redirect('petugas');
    }

    public function update(Request $req, $id)
    {	
    	$p = Petugas::find($id);
    	$p->nik    = $req->nik;
    	$p->nama   = $req->nama;
    	$p->jkel   = $req->jkel;
    	$p->alamat = $req->alamat;
    	$p->telp   = $req->telp;
    	$p->save();
        Alert::Success('Senna', 'Berhasil DiUpdate');
    	return redirect('petugas');
    }

    public function delete($id)
    {

    }
}
