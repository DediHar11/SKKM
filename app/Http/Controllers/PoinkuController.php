<?php

namespace App\Http\Controllers;

use App\Models\poin_minim;
use App\Models\kegiatan;
use Illuminate\Http\Request;
use App\Models\jeniskegiatan;
use App\Models\kategorikegiatan;
use App\Models\prestasikegiatan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PoinkuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = kegiatan::with('kategori_kegiatan', 'jenis_kegiatan', 'prestasi_kegiatan')->where('nim', Auth::user()->nim)->paginate(1000);
        $minim = poin_minim::where('nim', Auth::user()->nim)->get('point_minim')->first();
        $sudah_validasi = kegiatan::where('status_validasi', 1)->where('nim', Auth::user()->nim)->sum('point');
        $poin_baru = kegiatan::where('status_validasi', 0)->where('nim', Auth::user()->nim)->sum('point');
        return view('pages.skkm.poinku', compact('data', 'minim', 'poin_baru', 'sudah_validasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $kegiatan = kegiatan::all();
        $kategori = kategorikegiatan::all();
        $jenis = jeniskegiatan::all();
        $prestasi = prestasikegiatan::all();
        return view('pages.skkm.newpoin', compact('kategori', 'jenis', 'prestasi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $poin = $request->scan_sertifikat;
        $namaFile = time() . rand(100, 999) . "." . $poin->getClientOriginalName();

        $upload = new kegiatan();
        $upload->nim = Auth::user()->nim;
        $upload->nama_kegiatan_bhsindonesia = $request->nama_kegiatan_bhsindonesia;
        $upload->nama_kegiatan_bhsinggris = $request->nama_kegiatan_bhsinggris;
        $upload->no_sertifikat = $request->no_sertifikat;
        //TABEL KEGIATAN WAJIB PKKMB
        $upload->kategori_kegiatan_id = $request->kategori_kegiatan_id;
        if ($request->kategori_kegiatan_id == '1') { //KEGIATAN WAJIB
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '1') { //PKKMB & PRA STUDI
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '') { //KOSONG

                    $upload['point'] = '5';
                    $upload['kode_point'] = '1A';
                }
            }
        }
        //ENDTABEL KEGIATAN WAJIB PKKMB

        //TABEL KEPENGURUSAN ORGANISASI SELAIN ORGANISASI KEMAHASISWAAN INTRA
        $upload->kategori_kegiatan_id = $request->kategori_kegiatan_id;
        if ($request->kategori_kegiatan_id == '2') { //KEPENGURUSAN ORGANISASI SELAIN ORGANISASI KEMAHASISWAAN INTRA
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '2') { //INTERNASIONAL
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '1') { //KETUA

                    $upload['point'] = '5';
                    $upload['kode_point'] = '2A';
                } else if ($request->prestasi_kegiatan_id == '2') { //WAKIL KETUA

                    $upload['point'] = '4';
                    $upload['kode_point'] = '2B';
                } else if ($request->prestasi_kegiatan_id == '3') { //SEKRETARIS

                    $upload['point'] = '3';
                    $upload['kode_point'] = '2C';
                } else if ($request->prestasi_kegiatan_id == '4') { //BENDAHARA

                    $upload['point'] = '3';
                    $upload['kode_point'] = '2D';
                } else if ($request->prestasi_kegiatan_id == '5') { //KETUA BIDANG

                    $upload['point'] = '3';
                    $upload['kode_point'] = '2E';
                } else if ($request->prestasi_kegiatan_id == '6') { //ANGGOTA

                    $upload['point'] = '2.5';
                    $upload['kode_point'] = '2F';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '3') { //NASIONAL
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '1') { //KETUA

                    $upload['point'] = '4';
                    $upload['kode_point'] = '3A';
                } else if ($request->prestasi_kegiatan_id == '2') { //WAKIL KETUA

                    $upload['point'] = '3';
                    $upload['kode_point'] = '3B';
                } else if ($request->prestasi_kegiatan_id == '3') { //SEKRETARIS

                    $upload['point'] = '2.5';
                    $upload['kode_point'] = '3C';
                } else if ($request->prestasi_kegiatan_id == '4') { //BENDAHARA

                    $upload['point'] = '2.5';
                    $upload['kode_point'] = '3D';
                } else if ($request->prestasi_kegiatan_id == '5') { //KETUA BIDANG

                    $upload['point'] = '2';
                    $upload['kode_point'] = '3E';
                } else if ($request->prestasi_kegiatan_id == '6') { //ANGGOTA

                    $upload['point'] = '2';
                    $upload['kode_point'] = '3F';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '4') { //REGIONAL/PROPINSI
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '1') { //KETUA

                    $upload['point'] = '3';
                    $upload['kode_point'] = '4A';
                } else if ($request->prestasi_kegiatan_id == '2') { //WAKIL KETUA

                    $upload['point'] = '2';
                    $upload['kode_point'] = '4B';
                } else if ($request->prestasi_kegiatan_id == '3') { //SEKRETARIS

                    $upload['point'] = '1.5';
                    $upload['kode_point'] = '4C';
                } else if ($request->prestasi_kegiatan_id == '4') { //BENDAHARA

                    $upload['point'] = '1.5';
                    $upload['kode_point'] = '4D';
                } else if ($request->prestasi_kegiatan_id == '5') { //KETUA BIDANG

                    $upload['point'] = '1';
                    $upload['kode_point'] = '4E';
                } else if ($request->prestasi_kegiatan_id == '6') { //ANGGOTA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '4F';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '5') { //KABUPATEN/KOTA
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '1') { //KETUA

                    $upload['point'] = '2';
                    $upload['kode_point'] = '5A';
                } else if ($request->prestasi_kegiatan_id == '2') { //WAKIL KETUA

                    $upload['point'] = '1.5';
                    $upload['kode_point'] = '5B';
                } else if ($request->prestasi_kegiatan_id == '3') { //SEKRETARIS

                    $upload['point'] = '1.5';
                    $upload['kode_point'] = '5C';
                } else if ($request->prestasi_kegiatan_id == '4') { //BENDAHARA

                    $upload['point'] = '1.5';
                    $upload['kode_point'] = '5D';
                } else if ($request->prestasi_kegiatan_id == '5') { //KETUA BIDANG

                    $upload['point'] = '1';
                    $upload['kode_point'] = '5E';
                } else if ($request->prestasi_kegiatan_id == '6') { //ANGGOTA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '5F';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '6') { //KECAMATAN
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '1') { //KETUA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '6A';
                } else if ($request->prestasi_kegiatan_id == '2') { //WAKIL KETUA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '6B';
                } else if ($request->prestasi_kegiatan_id == '3') { //SEKRETARIS

                    $upload['point'] = '1';
                    $upload['kode_point'] = '6C';
                } else if ($request->prestasi_kegiatan_id == '4') { //BENDAHARA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '6D';
                } else if ($request->prestasi_kegiatan_id == '5') { //KETUA BIDANG

                    $upload['point'] = '1';
                    $upload['kode_point'] = '6E';
                } else if ($request->prestasi_kegiatan_id == '6') { //ANGGOTA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '6F';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '7') { //DESA
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '1') { //KETUA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '7A';
                } else if ($request->prestasi_kegiatan_id == '2') { //WAKIL KETUA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '7B';
                } else if ($request->prestasi_kegiatan_id == '3') { //SEKRETARIS

                    $upload['point'] = '1';
                    $upload['kode_point'] = '7C';
                } else if ($request->prestasi_kegiatan_id == '4') { //BENDAHARA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '7D';
                } else if ($request->prestasi_kegiatan_id == '5') { //KETUA BIDANG

                    $upload['point'] = '1';
                    $upload['kode_point'] = '7E';
                } else if ($request->prestasi_kegiatan_id == '6') { //ANGGOTA

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '7F';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '8') { //PENGURUS KELAS
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '7') { //KETUA KELAS

                    $upload['point'] = '1';
                    $upload['kode_point'] = '8A';
                } else if ($request->prestasi_kegiatan_id == '2') { //WAKIL KETUA

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '8B';
                } else if ($request->prestasi_kegiatan_id == '3') { //SEKRETARIS

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '8C';
                } else if ($request->prestasi_kegiatan_id == '4') { //BENDAHARA

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '8D';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '9') { //KEGIATAN SEMPRO/SEMHAS
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '8') { //MODERATOR

                    $upload['point'] = '1';
                    $upload['kode_point'] = '9A';
                } else if ($request->prestasi_kegiatan_id == '9') { //NOTULEN

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '9B';
                } else if ($request->prestasi_kegiatan_id == '10') { //KOREKTOR

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '9C';
                }
            }
        }
        //ENDTABEL KEPENGURUSAN ORGANISASI SELAIN ORGANISASI KEMAHASISWAAN INTRA

        //TABEL KEANGGOTAAN ORGANISASI INTERNAL KAMPUS POLIWANGI
        $upload->kategori_kegiatan_id = $request->kategori_kegiatan_id;
        if ($request->kategori_kegiatan_id == '3') { //KEANGGOTAAN ORGANISASI INTERNAL KAMPUS POLIWANGI
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '10') { //MPM
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '1') { //KETUA

                    $upload['point'] = '5';
                    $upload['kode_point'] = '10A';
                } else if ($request->prestasi_kegiatan_id == '2') { //WAKIL KETUA

                    $upload['point'] = '4';
                    $upload['kode_point'] = '10B';
                } else if ($request->prestasi_kegiatan_id == '3') { //SEKRETARIS

                    $upload['point'] = '3';
                    $upload['kode_point'] = '10C';
                } else if ($request->prestasi_kegiatan_id == '4') { //BENDAHARA

                    $upload['point'] = '3';
                    $upload['kode_point'] = '10D';
                } else if ($request->prestasi_kegiatan_id == '11') { //KETUA KOMISI

                    $upload['point'] = '2.5';
                    $upload['kode_point'] = '10E';
                } else if ($request->prestasi_kegiatan_id == '12') { //SEKRETARIS KOMISI

                    $upload['point'] = '2';
                    $upload['kode_point'] = '10F';
                } else if ($request->prestasi_kegiatan_id == '6') { //ANGGOTA

                    $upload['point'] = '1.5';
                    $upload['kode_point'] = '10G';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '11') { //BEM
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '13') { //PRESIDEN

                    $upload['point'] = '5';
                    $upload['kode_point'] = '11A';
                } else if ($request->prestasi_kegiatan_id == '14') { //WAKIL PRESIDEN

                    $upload['point'] = '4';
                    $upload['kode_point'] = '11B';
                } else if ($request->prestasi_kegiatan_id == '15') { //MENTERI

                    $upload['point'] = '3';
                    $upload['kode_point'] = '11C';
                } else if ($request->prestasi_kegiatan_id == '16') { //WAKIL MENTERI

                    $upload['point'] = '2.5';
                    $upload['kode_point'] = '11D';
                } else if ($request->prestasi_kegiatan_id == '6') { //ANGGOTA

                    $upload['point'] = '1.5';
                    $upload['kode_point'] = '11E';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '12') { //UKM
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '1') { //KETUA

                    $upload['point'] = '4';
                    $upload['kode_point'] = '12A';
                } else if ($request->prestasi_kegiatan_id == '2') { //WAKIL KETUA

                    $upload['point'] = '2.5';
                    $upload['kode_point'] = '12B';
                } else if ($request->prestasi_kegiatan_id == '3') { //SEKRETARIS

                    $upload['point'] = '2';
                    $upload['kode_point'] = '12C';
                } else if ($request->prestasi_kegiatan_id == '4') { //BENDAHARA

                    $upload['point'] = '2';
                    $upload['kode_point'] = '12D';
                } else if ($request->prestasi_kegiatan_id == '5') { //KETUA BIDANG

                    $upload['point'] = '2';
                    $upload['kode_point'] = '12E';
                } else if ($request->prestasi_kegiatan_id == '42') { //WAKIL BIDANG

                    $upload['point'] = '1.5';
                    $upload['kode_point'] = '12F';
                } else if ($request->prestasi_kegiatan_id == '43') { //SEKRETARIS BIDANG

                    $upload['point'] = '1.5';
                    $upload['kode_point'] = '12G';
                } else if ($request->prestasi_kegiatan_id == '17') { //ANGGOTA AKTIF

                    $upload['point'] = '1';
                    $upload['kode_point'] = '12H';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '13') { //HIMA
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '1') { //KETUA

                    $upload['point'] = '4';
                    $upload['kode_point'] = '13A';
                } else if ($request->prestasi_kegiatan_id == '2') { //WAKIL KETUA

                    $upload['point'] = '2.5';
                    $upload['kode_point'] = '13B';
                } else if ($request->prestasi_kegiatan_id == '3') { //SEKRETARIS

                    $upload['point'] = '2';
                    $upload['kode_point'] = '13C';
                } else if ($request->prestasi_kegiatan_id == '4') { //BENDAHARA

                    $upload['point'] = '2';
                    $upload['kode_point'] = '13D';
                } else if ($request->prestasi_kegiatan_id == '5') { //KETUA BIDANG

                    $upload['point'] = '2';
                    $upload['kode_point'] = '13E';
                } else if ($request->prestasi_kegiatan_id == '42') { //WAKIL BIDANG

                    $upload['point'] = '1.5';
                    $upload['kode_point'] = '13F';
                } else if ($request->prestasi_kegiatan_id == '43') { //SEKRETARIS BIDANG

                    $upload['point'] = '1.5';
                    $upload['kode_point'] = '13G';
                } else if ($request->prestasi_kegiatan_id == '17') { //ANGGOTA AKTIF

                    $upload['point'] = '1';
                    $upload['kode_point'] = '13H';
                }
            }
        }
        //ENDTABEL KEANGGOTAAN ORGANISASI INTERNAL KAMPUS POLIWANGI

        //TABEL KEPANITIAAN
        $upload->kategori_kegiatan_id = $request->kategori_kegiatan_id;
        if ($request->kategori_kegiatan_id == '4') { //KEPANITIAAN
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '2') { //INTERNASIONAL
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '18') { //PENGARAH

                    $upload['point'] = '4';
                    $upload['kode_point'] = '14A';
                } else if ($request->prestasi_kegiatan_id == '1') { //KETUA

                    $upload['point'] = '4';
                    $upload['kode_point'] = '14B';
                } else if ($request->prestasi_kegiatan_id == '2') { //WAKIL KETUA 

                    $upload['point'] = '3';
                    $upload['kode_point'] = '14C';
                } else if ($request->prestasi_kegiatan_id == '3') { //SEKRETARIS

                    $upload['point'] = '2.5';
                    $upload['kode_point'] = '14D';
                } else if ($request->prestasi_kegiatan_id == '4') { //BENDAHARA

                    $upload['point'] = '2.5';
                    $upload['kode_point'] = '14E';
                } else if ($request->prestasi_kegiatan_id == '5') { //KETUA BIDANG

                    $upload['point'] = '2';
                    $upload['kode_point'] = '14F';
                } else if ($request->prestasi_kegiatan_id == '6') { //ANGGOTA

                    $upload['point'] = '2';
                    $upload['kode_point'] = '14G';
                } else if ($request->prestasi_kegiatan_id == '19') { //PESERTA

                    $upload['point'] = '2';
                    $upload['kode_point'] = '14H';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '3') { //NASIONAL
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '18') { //PENGARAH

                    $upload['point'] = '2';
                    $upload['kode_point'] = '15A';
                } else if ($request->prestasi_kegiatan_id == '1') { //KETUA

                    $upload['point'] = '3';
                    $upload['kode_point'] = '15B';
                } else if ($request->prestasi_kegiatan_id == '2') { //WAKIL KETUA 

                    $upload['point'] = '2';
                    $upload['kode_point'] = '15C';
                } else if ($request->prestasi_kegiatan_id == '3') { //SEKRETARIS

                    $upload['point'] = '1.5';
                    $upload['kode_point'] = '15D';
                } else if ($request->prestasi_kegiatan_id == '4') { //BENDAHARA

                    $upload['point'] = '1.5';
                    $upload['kode_point'] = '15E';
                } else if ($request->prestasi_kegiatan_id == '5') { //KETUA BIDANG

                    $upload['point'] = '1.5';
                    $upload['kode_point'] = '15F';
                } else if ($request->prestasi_kegiatan_id == '6') { //ANGGOTA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '15G';
                } else if ($request->prestasi_kegiatan_id == '19') { //PESERTA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '15H';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '4') { //REGIONAL
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '18') { //PENGARAH

                    $upload['point'] = '2';
                    $upload['kode_point'] = '16A';
                } else if ($request->prestasi_kegiatan_id == '1') { //KETUA

                    $upload['point'] = '2';
                    $upload['kode_point'] = '16B';
                } else if ($request->prestasi_kegiatan_id == '2') { //WAKIL KETUA 

                    $upload['point'] = '1';
                    $upload['kode_point'] = '16C';
                } else if ($request->prestasi_kegiatan_id == '3') { //SEKRETARIS

                    $upload['point'] = '1';
                    $upload['kode_point'] = '16D';
                } else if ($request->prestasi_kegiatan_id == '4') { //BENDAHARA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '16E';
                } else if ($request->prestasi_kegiatan_id == '5') { //KETUA BIDANG

                    $upload['point'] = '1';
                    $upload['kode_point'] = '16F';
                } else if ($request->prestasi_kegiatan_id == '6') { //ANGGOTA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '16G';
                } else if ($request->prestasi_kegiatan_id == '19') { //PESERTA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '16H';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '5') { //KABUPATEN/KOTA
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '18') { //PENGARAH

                    $upload['point'] = '1';
                    $upload['kode_point'] = '17A';
                } else if ($request->prestasi_kegiatan_id == '1') { //KETUA

                    $upload['point'] = '2';
                    $upload['kode_point'] = '17B';
                } else if ($request->prestasi_kegiatan_id == '2') { //WAKIL KETUA 

                    $upload['point'] = '1';
                    $upload['kode_point'] = '17C';
                } else if ($request->prestasi_kegiatan_id == '3') { //SEKRETARIS

                    $upload['point'] = '1';
                    $upload['kode_point'] = '17D';
                } else if ($request->prestasi_kegiatan_id == '4') { //BENDAHARA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '17E';
                } else if ($request->prestasi_kegiatan_id == '5') { //KETUA BIDANG

                    $upload['point'] = '1';
                    $upload['kode_point'] = '17F';
                } else if ($request->prestasi_kegiatan_id == '6') { //ANGGOTA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '17G';
                } else if ($request->prestasi_kegiatan_id == '19') { //PESERTA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '17H';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '6') { //KECAMATAN
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '18') { //PENGARAH

                    $upload['point'] = '1.5';
                    $upload['kode_point'] = '18A';
                } else if ($request->prestasi_kegiatan_id == '1') { //KETUA

                    $upload['point'] = '1.5';
                    $upload['kode_point'] = '18B';
                } else if ($request->prestasi_kegiatan_id == '2') { //WAKIL KETUA 

                    $upload['point'] = '1';
                    $upload['kode_point'] = '18C';
                } else if ($request->prestasi_kegiatan_id == '3') { //SEKRETARIS

                    $upload['point'] = '1';
                    $upload['kode_point'] = '18D';
                } else if ($request->prestasi_kegiatan_id == '4') { //BENDAHARA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '18E';
                } else if ($request->prestasi_kegiatan_id == '5') { //KETUA BIDANG

                    $upload['point'] = '1';
                    $upload['kode_point'] = '18F';
                } else if ($request->prestasi_kegiatan_id == '6') { //ANGGOTA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '18G';
                } else if ($request->prestasi_kegiatan_id == '19') { //PESERTA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '18H';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '7') { //DESA
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '18') { //PENGARAH

                    $upload['point'] = '1';
                    $upload['kode_point'] = '19A';
                } else if ($request->prestasi_kegiatan_id == '1') { //KETUA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '19B';
                } else if ($request->prestasi_kegiatan_id == '2') { //WAKIL KETUA 

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '19C';
                } else if ($request->prestasi_kegiatan_id == '3') { //SEKRETARIS

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '19D';
                } else if ($request->prestasi_kegiatan_id == '4') { //BENDAHARA

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '19E';
                } else if ($request->prestasi_kegiatan_id == '5') { //KETUA BIDANG

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '19F';
                } else if ($request->prestasi_kegiatan_id == '6') { //ANGGOTA

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '19G';
                } else if ($request->prestasi_kegiatan_id == '19') { //PESERTA

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '19H';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '14') { //INTERNAL KAMPUS
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '18') { //PENGARAH

                    $upload['point'] = '1';
                    $upload['kode_point'] = '20A';
                } else if ($request->prestasi_kegiatan_id == '1') { //KETUA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '20B';
                } else if ($request->prestasi_kegiatan_id == '2') { //WAKIL KETUA 

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '20C';
                } else if ($request->prestasi_kegiatan_id == '3') { //SEKRETARIS

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '20D';
                } else if ($request->prestasi_kegiatan_id == '4') { //BENDAHARA

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '20E';
                } else if ($request->prestasi_kegiatan_id == '5') { //KETUA BIDANG

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '20F';
                }
            }
        }
        //ENDTABEL KEPANITIAAN

        //TABEL KEJUARAAN/KOMPETENSI/PERLOMBAAN
        $upload->kategori_kegiatan_id = $request->kategori_kegiatan_id;
        if ($request->kategori_kegiatan_id == '5') { //KEJUARAAN/KOMPETENSI/PERLOMBAAN
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '2') { //INTERNASIONAL
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '20') { //JUARA I

                    $upload['point'] = '7';
                    $upload['kode_point'] = '21A';
                } else if ($request->prestasi_kegiatan_id == '21') { //JUARA II

                    $upload['point'] = '4';
                    $upload['kode_point'] = '21B';
                } else if ($request->prestasi_kegiatan_id == '22') { //JUARA III

                    $upload['point'] = '3';
                    $upload['kode_point'] = '21C';
                } else if ($request->prestasi_kegiatan_id == '23') { //HARAPAN I

                    $upload['point'] = '2';
                    $upload['kode_point'] = '21D';
                } else if ($request->prestasi_kegiatan_id == '24') { //HARAPAN II

                    $upload['point'] = '2';
                    $upload['kode_point'] = '21E';
                } else if ($request->prestasi_kegiatan_id == '25') { //HARAPAN III

                    $upload['point'] = '2';
                    $upload['kode_point'] = '21F';
                } else if ($request->prestasi_kegiatan_id == '26') { //10 BESAR

                    $upload['point'] = '1.5';
                    $upload['kode_point'] = '21G';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '15') { //NASIONAL UMUM
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '20') { //JUARA I

                    $upload['point'] = '5';
                    $upload['kode_point'] = '22A';
                } else if ($request->prestasi_kegiatan_id == '21') { //JUARA II

                    $upload['point'] = '3';
                    $upload['kode_point'] = '22B';
                } else if ($request->prestasi_kegiatan_id == '22') { //JUARA III

                    $upload['point'] = '2';
                    $upload['kode_point'] = '22C';
                } else if ($request->prestasi_kegiatan_id == '23') { //HARAPAN I

                    $upload['point'] = '1.5';
                    $upload['kode_point'] = '22D';
                } else if ($request->prestasi_kegiatan_id == '24') { //HARAPAN II

                    $upload['point'] = '1.5';
                    $upload['kode_point'] = '22E';
                } else if ($request->prestasi_kegiatan_id == '25') { //HARAPAN III

                    $upload['point'] = '1.5';
                    $upload['kode_point'] = '22F';
                } else if ($request->prestasi_kegiatan_id == '26') { //10 BESAR

                    $upload['point'] = '1';
                    $upload['kode_point'] = '22G';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '16') { //NASIONAL PORSENI
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '20') { //JUARA I

                    $upload['point'] = '7';
                    $upload['kode_point'] = '23A';
                } else if ($request->prestasi_kegiatan_id == '21') { //JUARA II

                    $upload['point'] = '5';
                    $upload['kode_point'] = '23B';
                } else if ($request->prestasi_kegiatan_id == '22') { //JUARA III

                    $upload['point'] = '4';
                    $upload['kode_point'] = '23C';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '17') { //PKM / PIMNAS
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '27') { //MEDALI EMAS

                    $upload['point'] = '5';
                    $upload['kode_point'] = '24A';
                } else if ($request->prestasi_kegiatan_id == '28') { //MEDALI PERAK

                    $upload['point'] = '3';
                    $upload['kode_point'] = '24B';
                } else if ($request->prestasi_kegiatan_id == '29') { //MEDALI PERUNGGU

                    $upload['point'] = '2';
                    $upload['kode_point'] = '24C';
                } else if ($request->prestasi_kegiatan_id == '30') { //PENGHARGAAN KATEGORI

                    $upload['point'] = '1.5';
                    $upload['kode_point'] = '24D';
                } else if ($request->prestasi_kegiatan_id == '31') { //LOLOS PIMNAS

                    $upload['point'] = '1.5';
                    $upload['kode_point'] = '24E';
                } else if ($request->prestasi_kegiatan_id == '32') { //LOLOS PENDANAAN PKM

                    $upload['point'] = '1.5';
                    $upload['kode_point'] = '24F';
                } else if ($request->prestasi_kegiatan_id == '33') { //JUARA SE-POLIWANGI

                    $upload['point'] = '1';
                    $upload['kode_point'] = '24G';
                } else if ($request->prestasi_kegiatan_id == '34') { //UPLOAD PROPOSAL SIMBELMAWA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '24G';
                } else if ($request->prestasi_kegiatan_id == '35') { //PROPOSAL PKM

                    $upload['point'] = '1';
                    $upload['kode_point'] = '24G';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '4') { //REGIONAL/PROPINSI
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '20') { //JUARA I

                    $upload['point'] = '3';
                    $upload['kode_point'] = '25A';
                } else if ($request->prestasi_kegiatan_id == '21') { //JUARA II

                    $upload['point'] = '2';
                    $upload['kode_point'] = '25B';
                } else if ($request->prestasi_kegiatan_id == '22') { //JUARA III

                    $upload['point'] = '1';
                    $upload['kode_point'] = '25C';
                } else if ($request->prestasi_kegiatan_id == '23') { //HARAPAN I

                    $upload['point'] = '1';
                    $upload['kode_point'] = '25D';
                } else if ($request->prestasi_kegiatan_id == '24') { //HARAPAN II

                    $upload['point'] = '1';
                    $upload['kode_point'] = '25E';
                } else if ($request->prestasi_kegiatan_id == '25') { //HARAPAN III

                    $upload['point'] = '1';
                    $upload['kode_point'] = '25F';
                } else if ($request->prestasi_kegiatan_id == '26') { //10 BESAR

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '25G';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '5') { //KABUPATEN/KOTA
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '20') { //JUARA I

                    $upload['point'] = '2';
                    $upload['kode_point'] = '26A';
                } else if ($request->prestasi_kegiatan_id == '21') { //JUARA II

                    $upload['point'] = '1.5';
                    $upload['kode_point'] = '26B';
                } else if ($request->prestasi_kegiatan_id == '22') { //JUARA III

                    $upload['point'] = '1';
                    $upload['kode_point'] = '26C';
                } else if ($request->prestasi_kegiatan_id == '23') { //HARAPAN I

                    $upload['point'] = '1';
                    $upload['kode_point'] = '26D';
                } else if ($request->prestasi_kegiatan_id == '24') { //HARAPAN II

                    $upload['point'] = '1';
                    $upload['kode_point'] = '26E';
                } else if ($request->prestasi_kegiatan_id == '25') { //HARAPAN III

                    $upload['point'] = '1';
                    $upload['kode_point'] = '26F';
                } else if ($request->prestasi_kegiatan_id == '26') { //10 BESAR

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '26G';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '6') { //KECAMATAN
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '20') { //JUARA I

                    $upload['point'] = '1.5';
                    $upload['kode_point'] = '27A';
                } else if ($request->prestasi_kegiatan_id == '21') { //JUARA II

                    $upload['point'] = '1';
                    $upload['kode_point'] = '27B';
                } else if ($request->prestasi_kegiatan_id == '22') { //JUARA III

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '27C';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '7') { //DESA
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '20') { //JUARA I

                    $upload['point'] = '1';
                    $upload['kode_point'] = '28A';
                } else if ($request->prestasi_kegiatan_id == '21') { //JUARA II

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '28B';
                } else if ($request->prestasi_kegiatan_id == '22') { //JUARA III

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '28C';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '14') { //INTERNAL KAMPUS
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '20') { //JUARA I

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '29A';
                } else if ($request->prestasi_kegiatan_id == '21') { //JUARA II

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '29B';
                } else if ($request->prestasi_kegiatan_id == '22') { //JUARA III

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '29C';
                } else if ($request->prestasi_kegiatan_id == '23') { //HARAPAN I

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '29D';
                } else if ($request->prestasi_kegiatan_id == '24') { //HARAPAN II

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '29E';
                } else if ($request->prestasi_kegiatan_id == '25') { //HARAPAN III

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '29F';
                }
            }
        }
        //ENDTABEL KEJUARAAN/KOMPETENSI/PERLOMBAAN

        //TABEL PENELITIAN, PENGABDIAN MASYARAKAT, SEMINAR, KULIAH TAMU, PEMATERI DAN KEGIATAN ILMIAH LAINNYA
        $upload->kategori_kegiatan_id = $request->kategori_kegiatan_id;
        if ($request->kategori_kegiatan_id == '6') { //PENELITIAN, PENGABDIAN MASYARAKAT, SEMINAR, KULIAH TAMU, PEMATERI DAN KEGIATAN ILMIAH LAINNYA
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '2') { //INTERNASIONAL
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '1') { //KETUA

                    $upload['point'] = '5';
                    $upload['kode_point'] = '30A';
                } else if ($request->prestasi_kegiatan_id == '2') { //WAKIL KETUA

                    $upload['point'] = '3';
                    $upload['kode_point'] = '30B';
                } else if ($request->prestasi_kegiatan_id == '3') { //SEKRETARIS

                    $upload['point'] = '2';
                    $upload['kode_point'] = '30C';
                } else if ($request->prestasi_kegiatan_id == '4') { //BENDAHARA

                    $upload['point'] = '2';
                    $upload['kode_point'] = '30D';
                } else if ($request->prestasi_kegiatan_id == '5') { //KETUA BIDANG

                    $upload['point'] = '2';
                    $upload['kode_point'] = '30E';
                } else if ($request->prestasi_kegiatan_id == '6') { //ANGGOTA

                    $upload['point'] = '2';
                    $upload['kode_point'] = '30F';
                } else if ($request->prestasi_kegiatan_id == '19') { //PESERTA

                    $upload['point'] = '2';
                    $upload['kode_point'] = '30G';
                } else if ($request->prestasi_kegiatan_id == '36') { //PENYAJI

                    $upload['point'] = '4';
                    $upload['kode_point'] = '30H';
                } else if ($request->prestasi_kegiatan_id == '37') { //NARASUMBER

                    $upload['point'] = '4';
                    $upload['kode_point'] = '30I';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '3') { //NASIONAL
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '1') { //KETUA

                    $upload['point'] = '3';
                    $upload['kode_point'] = '31A';
                } else if ($request->prestasi_kegiatan_id == '2') { //WAKIL KETUA

                    $upload['point'] = '2';
                    $upload['kode_point'] = '31B';
                } else if ($request->prestasi_kegiatan_id == '3') { //SEKRETARIS

                    $upload['point'] = '1';
                    $upload['kode_point'] = '31C';
                } else if ($request->prestasi_kegiatan_id == '4') { //BENDAHARA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '31D';
                } else if ($request->prestasi_kegiatan_id == '5') { //KETUA BIDANG

                    $upload['point'] = '1';
                    $upload['kode_point'] = '31E';
                } else if ($request->prestasi_kegiatan_id == '6') { //ANGGOTA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '31F';
                } else if ($request->prestasi_kegiatan_id == '19') { //PESERTA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '31G';
                } else if ($request->prestasi_kegiatan_id == '36') { //PENYAJI

                    $upload['point'] = '3';
                    $upload['kode_point'] = '31H';
                } else if ($request->prestasi_kegiatan_id == '37') { //NARASUMBER

                    $upload['point'] = '3';
                    $upload['kode_point'] = '31I';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '18') { //LOKAL
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '1') { //KETUA

                    $upload['point'] = '2';
                    $upload['kode_point'] = '32A';
                } else if ($request->prestasi_kegiatan_id == '2') { //WAKIL KETUA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '32B';
                } else if ($request->prestasi_kegiatan_id == '3') { //SEKRETARIS

                    $upload['point'] = '1';
                    $upload['kode_point'] = '32C';
                } else if ($request->prestasi_kegiatan_id == '4') { //BENDAHARA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '32D';
                } else if ($request->prestasi_kegiatan_id == '5') { //KETUA BIDANG

                    $upload['point'] = '1';
                    $upload['kode_point'] = '32E';
                } else if ($request->prestasi_kegiatan_id == '6') { //ANGGOTA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '32F';
                } else if ($request->prestasi_kegiatan_id == '19') { //PESERTA

                    $upload['point'] = '1';
                    $upload['kode_point'] = '32G';
                } else if ($request->prestasi_kegiatan_id == '36') { //PENYAJI

                    $upload['point'] = '2';
                    $upload['kode_point'] = '32H';
                } else if ($request->prestasi_kegiatan_id == '37') { //NARASUMBER

                    $upload['point'] = '2';
                    $upload['kode_point'] = '32I';
                } else if ($request->prestasi_kegiatan_id == '38') { //MENTOR

                    $upload['point'] = '2';
                    $upload['kode_point'] = '32J';
                } else if ($request->prestasi_kegiatan_id == '39') { //TUTOR

                    $upload['point'] = '2';
                    $upload['kode_point'] = '32K';
                }
            }
        }
        //ENDTABEL PENELITIAN, PENGABDIAN MASYARAKAT, SEMINAR, KULIAH TAMU, PEMATERI DAN KEGIATAN ILMIAH LAINNYA

        //TABEL PENGHARGAAN AKADEMIK DAN NON AKADEMIK
        $upload->kategori_kegiatan_id = $request->kategori_kegiatan_id;
        if ($request->kategori_kegiatan_id == '7') { //PENGHARGAAN AKADEMIK DAN NON AKADEMIK
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '2') { //INTERNASIONAL
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '') { //KOSONG

                    $upload['point'] = '4';
                    $upload['kode_point'] = '33A';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '3') { //NASIONAL
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '') { //KOSONG

                    $upload['point'] = '3';
                    $upload['kode_point'] = '34A';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '4') { //REGIONAL
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '') { //KOSONG

                    $upload['point'] = '2';
                    $upload['kode_point'] = '35A';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '18') { //LOKAL
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '') { //KOSONG

                    $upload['point'] = '1';
                    $upload['kode_point'] = '36A';
                }
            }
        }
        //ENDTABEL PENGHARGAAN AKADEMIK DAN NON AKADEMIK

        //TABEL HAK PATEN, HAK CIPTA
        $upload->kategori_kegiatan_id = $request->kategori_kegiatan_id;
        if ($request->kategori_kegiatan_id == '8') { //HAK PATEN, HAK CIPTA
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '2') { //INTERNASIONAL
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '') { //KOSONG

                    $upload['point'] = '6';
                    $upload['kode_point'] = '37A';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '3') { //NASIONAL
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '') { //KOSONG

                    $upload['point'] = '5';
                    $upload['kode_point'] = '38A';
                }
            }
        }
        //ENDTABEL HAK PATEN, HAK CIPTA

        //TABEL PERTANDINGAN PERSAHABATAN ANTAR KAMPUS/JURUSAN DENGAN PIHAK LAIN/INDUSTRI/INSTITUSI
        $upload->kategori_kegiatan_id = $request->kategori_kegiatan_id;
        if ($request->kategori_kegiatan_id == '9') { //PERTANDINGAN PERSAHABATAN ANTAR KAMPUS/JURUSAN DENGAN PIHAK LAIN/INDUSTRI/INSTITUSI
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '2') { //INTERNASIONAL
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '40') { //KETUA TIM

                    $upload['point'] = '2';
                    $upload['kode_point'] = '39A';
                } else if ($request->prestasi_kegiatan_id == '41') { //PEMAIN

                    $upload['point'] = '1';
                    $upload['kode_point'] = '39B';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '3') { //NASIONAL
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '40') { //KETUA TIM

                    $upload['point'] = '2';
                    $upload['kode_point'] = '40A';
                } else if ($request->prestasi_kegiatan_id == '41') { //PEMAIN

                    $upload['point'] = '1';
                    $upload['kode_point'] = '40B';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '4') { //REGIONAL/PROPINSI
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '40') { //KETUA TIM

                    $upload['point'] = '1';
                    $upload['kode_point'] = '41A';
                } else if ($request->prestasi_kegiatan_id == '41') { //PEMAIN

                    $upload['point'] = '1';
                    $upload['kode_point'] = '41B';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '5') { //KABUPATEN/KOTA
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '40') { //KETUA TIM

                    $upload['point'] = '1';
                    $upload['kode_point'] = '42A';
                } else if ($request->prestasi_kegiatan_id == '41') { //PEMAIN

                    $upload['point'] = '1';
                    $upload['kode_point'] = '42B';
                }
            }
            $upload->jenis_kegiatan_id = $request->jenis_kegiatan_id;
            if ($request->jenis_kegiatan_id == '19') { //INTERNAL POLIWANGI
                $upload->prestasi_kegiatan_id = $request->prestasi_kegiatan_id;
                if ($request->prestasi_kegiatan_id == '41') { //PEMAIN

                    $upload['point'] = '0.5';
                    $upload['kode_point'] = '43A';
                }
            }
        }
        //ENDTABEL PERTANDINGAN PERSAHABATAN ANTAR KAMPUS/JURUSAN DENGAN PIHAK LAIN/INDUSTRI/INSTITUSI
        $upload->jenis_sertifikat = implode(",", $request->get('sertifikats'));
        $upload->scan_sertifikat = $namaFile;

        $poin->move(public_path() . '/scan_sertifikat', $namaFile);

        $upload->status_validasi = 0;
        $upload->save();

        $poin_baru = kegiatan::where('status_validasi', 0)->sum('point');
        $sudah_validasi = kegiatan::where('status_validasi', 1)->sum('point');

        return redirect('/poinku');
    }

    public function cetak_poin()
    {
        $data = kegiatan::where('status_validasi', 1)->where('nim', Auth::user()->nim)->with('kategori_kegiatan', 'jenis_kegiatan', 'prestasi_kegiatan')->get();
        $sudah_validasi = kegiatan::where('nim', Auth::user()->nim)->where('status_validasi', 1)->sum('point');
        return view('pages.skkm.cetak', compact('data', 'sudah_validasi'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = kegiatan::findOrFail($id);
        $kategori = kategorikegiatan::all();
        $jenis = jeniskegiatan::all();
        $prestasi = prestasikegiatan::all();
        return view('pages.skkm.perbaruipoinku', compact('kategori', 'jenis', 'prestasi', 'data'));
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
        $update = kegiatan::findOrFail($id);
        $file = public_path('/scan_sertifikat/') . $update->scan_sertifikat;
        $gambar = $update->scan_sertifikat;
        if ($request->has('scan_sertifikat')) {
            @unlink($file);
        $request->scan_sertifikat->move(public_path() . '/scan_sertifikat', $gambar);
        }else{
            $gambar;
        }
        $update->nama_kegiatan_bhsindonesia = $request->input('nama_kegiatan_bhsindonesia');
        $update->nama_kegiatan_bhsinggris = $request->input('nama_kegiatan_bhsinggris');
        $update->no_sertifikat = $request->input('no_sertifikat');
        $update->jenis_sertifikat = implode(",", $request->get('sertifikats'));
        $update->status_validasi = '0';
        $update->keterangan = '';
        $update->update();

        $poin_baru = kegiatan::where('status_validasi', 0)->sum('point');
        $sudah_validasi = kegiatan::where('status_validasi', 1)->sum('point');

        return redirect('/poinku');
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
