<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\kegiatan;
use App\Models\poin_minim;
use Illuminate\Http\Request;
use App\Models\jeniskegiatan;
use App\Models\kategorikegiatan;
use App\Models\prestasikegiatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VerifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $minim = poin_minim::pluck('point_minim')->first();
        $sudah_validasi = kegiatan::where('status_validasi',1)->sum('point');
        $poin_baru = kegiatan::where('status_validasi',0)->sum('point');
        $data = kegiatan::with('kategori_kegiatan','jenis_kegiatan','prestasi_kegiatan')->paginate(1000);
        return view('pages.bem.verifikasipoin',compact('data','minim','sudah_validasi','poin_baru'));
    }

    public function belumverifi()
    {
        $data = kegiatan::with('kategori_kegiatan','jenis_kegiatan','prestasi_kegiatan')->where('status_validasi',0)->paginate(1000);
        return view('pages.bem.belumverifi',compact('data'));
    }
    public function sudahverifi()
    {
        $data = kegiatan::with('kategori_kegiatan','jenis_kegiatan','prestasi_kegiatan')->where('status_validasi',1)->paginate(1000);
        return view('pages.bem.sudahverifi',compact('data'));
    }

    public function ditolak()
    {
        $data = kegiatan::with('kategori_kegiatan','jenis_kegiatan','prestasi_kegiatan')->where('status_validasi',2)->paginate(1000);
        return view('pages.bem.ditolak',compact('data'));
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
        $data = kegiatan::findOrFail($id);
        $kategori = kategorikegiatan::all();
        $jenis = jeniskegiatan::all();
        $mahasiswa = User::select('*')->where('nim', $data->nim)->first();
        $prestasi = prestasikegiatan::all();
        
        return view('pages.bem.validasipoin', compact('data','kategori','jenis','prestasi','mahasiswa'),['data' => explode(',', $data->jenis_sertifikat)]);
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
        $update = kegiatan::findOrFail($id);
        $sudah_validasi = kegiatan::where('id',$id)->pluck('point')->first();
        $minim = poin_minim::where('nim', $update->nim )->pluck('point_minim')->first();
        if($update->status_validasi == 1){
            //action unverifikasi
            $rata = $minim + $sudah_validasi;
            $update->status_validasi = 0;
        }else {
            $rata = $minim - $sudah_validasi;
            //verifikasi
            $update->status_validasi = 1;
        }
        $update->update();
        
        $poin_baru = kegiatan::where('status_validasi',0)->sum('point');
        
        DB::table('poin_minims')
              ->where('nim',$update->nim)
              ->update(['point_minim' => $rata]);
        return redirect('verifikasi/'.$id.'/edit');
    }

    public function tolak(Request $request, $id)
    {
        $tolak = kegiatan::findOrFail($id);
        $data = kegiatan::findOrFail($id);
        $kategori = kategorikegiatan::all();
        $jenis = jeniskegiatan::all();
        $mahasiswa = User::select('*')->where('nim', $data->nim)->first();
        $prestasi = prestasikegiatan::all();
        
        return view('pages.bem.keterangantolak',compact('tolak','mahasiswa','data'));
    }

    public function keterangan_tolak(Request $request, $id)
    {
        $tolak = kegiatan::findOrFail($id);
        if($tolak->status_validasi == 0){
            $tolak->status_validasi = 2;
            $tolak->keterangan = $request->keterangan;
        }else{
            $tolak->status_validasi = 0;
            $tolak->keterangan = '';
        }
        $tolak->update();
        return redirect('/verifikasi');
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
    public function hapus($id)
    {
        $hapus = kegiatan::findOrFail($id);

        $file = public_path('/scan_sertifikat/').$hapus->scan_sertifikat;
        if (file_exists($file)){
            @unlink($file);
        }
        $hapus->delete();
        return redirect('/verifikasi');
    }
}
