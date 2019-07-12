<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use Alert;

class StatusController extends Controller
{
    public function index()
    {
    	$data = Status::all();
    	return view('status.index',compact('data'));
    }

    public function add()
    {
    	return view('status.add');
    }
    public function edit($id)
    {
    	$data = Status::find($id);
    	return view('status.edit',compact('data'));
    }

    public function store(Request $req)
    {
        $s = new Status;
        $s->nama_status = $req->nama_status;
        $s->icon = $req->icon;
        $s->save();
        Alert::Success('Senna', 'Status Berhasil Disimpan');
        return redirect('/status');
    }

     public function update(Request $req, $id)
    {
        $s = Status::find($id);
        $s->nama_status = $req->nama_status;
        $s->icon = $req->icon;
        $s->save();
        Alert::Success('Senna', 'Status Berhasil Di Update');
        return redirect('/status');
    }

    public function delete($id)
    {
    	$del = Status::find($id);
    	$del->delete();
        Alert::Success('Senna', 'Status Berhasil Dihapus');
    	return back();
    }
}
