<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arsip;
class MemberController extends Controller
{
    public function index()
    {

        $data = Arsip::all();
    	return view ('sertifikatuser.index',compact('data'));
    }
}
