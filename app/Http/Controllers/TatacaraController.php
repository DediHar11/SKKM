<?php

namespace App\Http\Controllers;

use App\Models\panduan;
use Illuminate\Http\Request;

class TatacaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = panduan::all();
        return view('pages.skkm.tatacara', compact('data'), [
            'p' => panduan::count(),
            // 'boot'=>panduan::where('nama','dedi')->count()
        ]);
    }

    public function unduh($id)
    {
        $unduh = panduan::findOrFail($id);
        $path = 'D:\laravel8_SKKM/public/pdf/' . $unduh->panduan_file;
        $unduh->download = $unduh->download+1;
        $unduh->update();
        return response()->download($path, $unduh->panduan_file, ['Content-Type:' . 'application/pdf']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('pages.skkm.viewfile',compact('data'));
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
