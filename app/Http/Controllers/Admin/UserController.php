<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;

use App\Models\prodi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\poin_minim;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Inline\Element\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('pages.profil.profile',[
            'user'=>$user
        ]);
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
        $prodi = prodi::all();
        $user = User::with('prodi')->findOrFail($id);
        return view('pages.profil.editprofil',compact('user','prodi'));
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
        $update = User::findOrFail($id);
        // $date1 = poin_minim::where('nim', Auth::user()->nim);
        $update->name = $request->name;
        $update->email = $request->email;
        $update->prodi_id = $request->prodi_id;
        $update->nohp = $request->nohp;

        $file = public_path('/gambar/').$update->images;
        
        if($request->file('images') != null){
            if(file_exists($file)){
                //maka delete file di folder public/gambar
                @unlink($file);
            }
            //delete data didatabase
            $nm = $request->images;
            $namaFile = time() . rand(100,900) . "." . $nm->getClientOriginalExtension();
            $update->images = $namaFile;
            $nm->move(public_path() . '/gambar',$namaFile);
        }
        $update->update();
        return redirect('/profil');
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
