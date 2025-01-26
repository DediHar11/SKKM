<?php

namespace App\Http\Controllers;

use App\Models\kegiatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function index()
    {
        // return view('pages.dashboardmhs');
        if(Auth::user()->roles === 'bem'){
            return view('pages.dashboardbem',['verifi'=>kegiatan::where('status_validasi',1)->count(),'noverifi'=>kegiatan::where('status_validasi',0)->count(),'ditolak'=>kegiatan::where('status_validasi',2)->count()]);
        }
        if(Auth::user()->roles === 'mahasiswa'){
            $dtuser = User::where('roles','bem')->get();
            return view('pages.dashboardmhs',compact('dtuser'));
        }
        if(Auth::user()->roles === 'adminutama'){
            return view('pages.dashboardadmin',
            ['bem'=>User::where('roles','bem')->count()],['admin1'=>User::where('roles','adminutama')->count(),'seluruh'=>kegiatan::count(),'usermahasiswa'=>User::where('roles','mahasiswa')->count()]);
        }
    }
}
