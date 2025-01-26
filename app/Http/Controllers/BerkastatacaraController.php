<?php

namespace App\Http\Controllers;

use App\Models\panduan;
use Illuminate\Http\Request;

class BerkastatacaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = panduan::all();
        return view('pages.adminutama.panduan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = panduan::all();
        return view('pages.adminutama.newpanduan', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama = $request->panduan_file;
        $random = time() . rand(100, 99) . "." . $nama->getClientOriginalName();

        $upload = new panduan;
        $upload->nama_file = $request->nama_file;
        $upload->panduan_file = $random;
        $nama->move(public_path() . '/pdf', $random);
        $upload->save();
        return redirect('/berkas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = panduan::find($id);
        return view('pages.adminutama.viewpanduan',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = panduan::findOrFail($id);
        return view('pages.adminutama.updatepanduan', compact('data'));
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
        $update = panduan::findOrFail($id);
        $update->nama_file = $request->input('nama_file');
        $file = public_path('/pdf/').$update->panduan_file;
        $awal = $update->panduan_file;

        if($request->has('panduan_file')){
            @unlink($file);
            $request->panduan_file->move(public_path() . '/pdf',$awal);
        }else{
            $awal;
        }
        $update->update();
        return redirect('/berkas');
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

    // public function download($id)
    // {
    //     $unduh = panduan::findOrFail($id);
    //     $path = 'D:\laravel8_SKKM/public/pdf/' . $unduh->panduan_file;
    //     return response()->download($path, $unduh->panduan_file, ['Content-Type:' . 'application/pdf']);
    // }

    public function hapus($id){
        $delete = panduan::findOrFail($id);

        $file = public_path('/pdf/').$delete->panduan_file;
        if (file_exists($file)){
            @unlink($file);
        }
        $delete->delete();
        return back();
    }
}
