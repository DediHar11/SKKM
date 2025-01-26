@extends('layouts.master')
@section('content')
	<!-- dashboard_mahasiswa -->
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper">
	<div class="content-body">
		<!-- Zero configuration table -->
		<section id="basic-datatable">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title" style="font-weight:bold;"><i class="feather icon-home"></i>DASHBOARD</h4>
					</div>
					<div class="col-12 mt-2 ml-1">
						<!-- Square buttons -->
						<button type="button" class="btn btn-outline-danger square mr-1 mb-1">Pemberitahuan</button>
						<button type="button" class="btn btn-outline-info square mr-1 mb-1">Surat Keputusan</button>
					</div>
					<div class="card-content">
						<div class="card-body card-dashboard">
							<div class="alert alert-primary alert-dismissible fade show" role="alert">
								<h2 class="card-text" style="color:red; text-align:center; font-weight:bold;">PEMBERITAHUAN!</h2>
							</div>
							<div class="text" style="color:black">
							<p><i class="fa fa-first-order" style="color:black"></i> Diberitahukan kepada seluruh mahasiswa bahwa daftar kegiatan yang dapat diunggah di website SKKM adalah daftar kegiatan yang diikuti selama masa studi di Politeknik Negeri Banyuwangi. Daftar kegiatan diluar masa studi tidak dapat dihitung dalam angka kredit SKKM.</p>
							<p><i class="fa fa-first-order" style="color:black"></i> Diwajibkan mengunggah foto formal di web SKKM karena akan tercetak di Form SKKM dan SK SKKM. </p>
							<p><i class="fa fa-first-order" style="color:black"></i> Berhak mendapatkan fasilitas percepatan birokrasi SKKM khusus mahasiswa yang diterima kerja lebih awal sebelum wisuda atau mahasiswa yang mengikuti sidang skripsi/TA jalur khusus karena diterima kerja, dengan menunjukan bukti diterima kerja atau LOA (Letter Of Acceptance) dari perusahaan secara tertulis kepada BEM.</p>
							<p><i class="fa fa-first-order" style="color:black"></i> Untuk mahasiswa alumni yang belum menyelesaikan tanggungan SKKM dimohon segera menghubungi BEM </p>
							<p><i class="fa fa-first-order" style="color:black"></i> Sertifikat yang tidak ada namanya harap diberi nama sebelum di upload! Penguploadtan sertifikat, wajib dalam bentuk scan berwarna! Selain dalam bentuk scan, sertifikat tidak dapat diverifikasi!</p>
							<p><i class="fa fa-first-order" style="color:black"></i> Pernyataan lebih lanjut dapat menghubungi BEM : </p>
							</div>
							<div class="text ml-2">@foreach($dtuser as $row)
								<h6><i class="fa fa-minus" style="color:black"></i> BEM : {{$row->nohp}} ({{$row->name}}) </h6>
													@endforeach
							</div>
							<h5 class="font" style="color:red; font-weight:bold;">CATATAN : KEGIATAN YANG TIDAK DIAKUI DI DALAM SKKM:</h5>
							<h6 class="text responsive">
							<p>1. <a style="color:red ;">Test PECT (TOEIC)/TOEFL/IELTS atau Sertifikasi Bahasa lainnya.</a>
							<br>2. <a style="color:red ;">Test Urine.</a>
							<br>3. <a style="color:red ;">Piagam/Sertifikasi Keahlian.</a>
							<br>4. <a style="color:red ;">Sertifikat mengikuti Program PMMB/PKL.</a>
							<br>5. <a style="color:red ;">Sertifikat peserta Dialog Dosen dan Mahasiswa (DDM) dan atau Dialog Pimpinan dan Mahasiswa (DIPAM).</a>
							<br>6. <a style="color:red ;">Sertifikat peserta Dies Natalis.</a>
							<br>7. <a style="color:red ;">Sertfikat konser atau sejenisnya.</a>
							<br>8. <a style="color:red ;">Kegiatan yang mengandung nilai atau hasil dari kegiatan.</a>
							<br>9. <a style="color:red ;">Kegiatan yang tidak relevan dengan kategori penilaian SKKM.</a></p>
							</h6>
						
						</div>
					</div>
				</div>
				</section>
				<!--/ Zero configuration table -->
			</div>
		</div>
		<!-- end_dasboard_mahasiswa -->
@endsection
