<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DatauserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtuser = User::where('roles','adminutama')->get();
        return view('pages.userskkm.useradmin',[
            'dtuser'=>$dtuser
        ]);
    }

    public function datamahasiswa()
    {
        $dtuser = User::where('roles','mahasiswa')->get();
        return view('pages.userskkm.datausermahasiswa',['dtuser'=>$dtuser]);
    }
    public function hapusdatamahasiswa($id)
    {
        $delete = User::find($id);
        $file = public_path('/gambar/').$delete->images;
        if (file_exists($file)){
            @unlink($file);
        }
        $delete->delete();
        return redirect('/datamahasiswa');
    }

    public function databem()
    {
        $dtuser = User::where('roles','bem')->get();
        return view('pages.userskkm.datauserbem',['dtuser'=>$dtuser]);
    }

    public function hapusdatabem($id)
    {
        $delete = User::find($id);
        $file = public_path('/gambar/').$delete->images;
        if (file_exists($file)){
            @unlink($file);
        }
        $delete->delete();
        return redirect('/databem');
    }
    public function seluruhdata()
    {
        $data = kegiatan::with('kategori_kegiatan', 'jenis_kegiatan', 'prestasi_kegiatan')->paginate(1000);
        
        return view('pages.adminutama.seluruhkegiatan', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $dtuser = User::all();
        // return view('pages.userskkm.tambahuser', compact('dtuser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $upload = new User;
        $upload->nim = $request->nim;
        $upload->name = $request->name;
        $upload->email = $request->email;
        $upload->nohp = $request->nohp;
        $upload->roles = 'bem';
        $upload->password = bcrypt('12345678');
        $upload->save();
        return redirect('/databem');
    }

    public function storeadmin(Request $request)
    {
        $upload = new User;
        $upload->nim = $request->nim;
        $upload->name = $request->name;
        $upload->email = $request->email;
        $upload->roles = 'adminutama';
        $upload->password = bcrypt('12345678');
        $upload->save();
        return redirect('/dataadmin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
