@extends('layouts.master')
@section('content')
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper">
	<div class="content-body">
		<!-- Basic Horizontal form layout section start -->
		<section id="basic-horizontal-layouts">
			<div class="row match-height">
				<div class="col-md-12 col-12">
					<div class="card" style="height:100%; width:100%;">
						<div class="card-header">
							@if($data->status_validasi == 0)
							<h4 class="card-title" style="font-weight:bold;color:teal;"><i class="feather icon-award"></i>FORM VERIFIKASI POIN</h4>
							@endif
							@if($data->status_validasi == 1)
							<h4 class="card-title" style="font-weight:bold;color:teal;"><i class="feather icon-award"></i>FORM VERIFIKASI POIN TERVERIFIKASI</h4>
							@endif
							@if($data->status_validasi == 2)
							<h4 class="card-title" style="font-weight:bold;color:red;"><i class="feather icon-award"></i>FORM VERIFIKASI POIN DITOLAK</h4>
							@endif
						</div>
						<hr>

						<div class="card-content">
							<div class="card-body">
								<div class="alert alert-primary alert-dismissible fade show" role="alert">
									<img src="{{asset('/admin/app-assets/images/ico/Lambang_POLIWANGI.png')}}" height="40" width="40" alt="">
									<h7 class="text" style="color:black; font-weight: bold;">
										Identitas Mahasiswa
									</h7>
									<h6 class="text ml-3" style="color:black;">#Nama : {{$mahasiswa->name}} #Nim : {{$data->nim}} #Prodi : {{$mahasiswa->prodi->prodi}}</h6>
								</div>
								<!-- gambar -->
								<!-- <div class="rounded float-right">

									<img id="gambar" src="{{ asset ('scan_sertifikat/'.$data->scan_sertifikat) }}" height="200" width="320" alt="">

								</div> -->
								<!-- endgambar -->
								<form class="form form-horizontal" action="{{route('verifikasi.update',$data->id)}}" method="post" enctype="multipart/form-data">
									{{@csrf_field()}}
									{{ method_field('PATCH') }}
									<div class="form-body">
										<div class="row">
											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-4">
														<span>Nama Kegiatan(BHS.INDONESIA)</span>
													</div>
													<div class="col-md-8">
														<input readonly="readonly" type="text" id="nama_kegiatan_bhsindonesia" class="form-control" name="nama_kegiatan_bhsindonesia" value="{{$data->nama_kegiatan_bhsindonesia}}" placeholder="Inputkan Nama Kegiatan Dalam Bahasa Indonesia">
													</div>
												</div>
											</div>

											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-4">
														<span>Nama Kegiatan(BHS.INGGRIS)</span>
													</div>
													<div class="col-md-8">
														<input readonly="readonly" type="text" id="nama_kegiatan_bhsinggris" class="form-control" name="nama_kegiatan_bhsinggris" value="{{$data->nama_kegiatan_bhsinggris}}" placeholder="Inputkan Nama Kegiatan Dalam Bahasa Inggris">
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-4">
														<span>No Sertifikat/SK/ST</span>
													</div>
													<div class="col-md-8">
														<input readonly="readonly" type="text" id="no_sertifikat" class="form-control" name="no_sertifikat" value="{{$data->no_sertifikat}}" placeholder="Inputkan Nommor Sertifikat Atau SK Atau ST">
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-4">
														<span>Kategori Kegiatan</span>
													</div>
													<div class="col-md-8">
														<input readonly="readonly" type="text" id="kategori_kegiatan_id" class="form-control" name="kategori_kegiatan_id" value="{{$data->kategori_kegiatan->kategori_kegiatan}}">
													</div>

												</div>
											</div>
											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-4">
														<span>Jenis/Tingkat/Organisasi Kegiatan</span>
													</div>
													<div class="col-md-8">
														<input readonly="readonly" type="text" id="jenis_kegiatan" class="form-control" name="jenis_kegiatan" value="{{$data->jenis_kegiatan->jenis_kegiatan}}">
													</div>

												</div>
											</div>
											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-4">
														<span>Jabatan/Prestasi Kegiatan</span>
													</div>
													<div class="col-md-8">
														<input readonly="readonly" type="text" id="prestasi_kegiatan" class="form-control" name="prestasi_kegiatan" value="{{$data->prestasi_kegiatan->prestasi_kegiatan ?? ''}}">
													</div>

												</div>
											</div>
											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-4">
														<span>Dasar Penilaian</span>
													</div>
													<div class="col-md-8">
														<ul class="list-unstyled mb-0">

															<li class="d-inline-block mr-2">
																<fieldset>
																	<label>
																		<input onclick="return false;" type="checkbox" name="sertifikats[]" {{ $data->jenis_sertifikat == "SERTIFIKAT" ? 'checked':'' }} value="SERTIFIKAT"> SERTIFIKAT</label>
																</fieldset>
															</li>
															<li class="d-inline-block mr-2">
																<fieldset>
																	<label>
																		<input onclick="return false;" type="checkbox" name="sertifikats[]" {{ $data->jenis_sertifikat == "SK" ? 'checked':'' }} value="SK"> SK</label>
																</fieldset>
															</li>
															<li class="d-inline-block mr-2">
																<fieldset>
																	<label>
																		<input onclick="return false;" type="checkbox" name="sertifikats[]" {{ $data->jenis_sertifikat == "ST" ? 'checked':'' }} value="ST"> ST</label>
																</fieldset>
															</li>
															<li class="d-inline-block">
																<fieldset>
																	<label>
																		<input onclick="return false;" type="checkbox" name="sertifikats[]" {{ $data->jenis_sertifikat == "KARTU ANGGOTA" ? 'checked':'' }} value="KARTU ANGGOTA"> KARTU ANGGOTA</label>
																</fieldset>
															</li>
															<li class="d-inline-block">
																<fieldset>
																	<label>
																		<input onclick="return false;" type="checkbox" name="sertifikats[]" {{ $data->jenis_sertifikat == "PIAGAM" ? 'checked':'' }} value="PIAGAM"> PIAGAM</label>
																</fieldset>
															</li>

														</ul>
													</div>
												</div>
											</div>
											<!-- checkboxes -->
											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-4">
														<span>File Dokumen</span>
													</div>
													<div class="col-md-8">
														<a href="{{ asset ('scan_sertifikat/'.$data->scan_sertifikat) }}" width="30%" height="40%">Lihat Dokumen</a>
													</div>
												</div>
											</div>
											@if($data->status_validasi == 2)
											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-4">
														<span style="font-weight:bold ;">Kurang Sesuai</span>
													</div>
													<div class="col-md-8">
														<textarea readonly="readonly" style="resize:none;width:100%;height:100%; color:red;font-weight:bold;" id="keterangan" name="keterangan" class="from-control" placeholder="Keterangan lain">{{$data->keterangan}}</textarea>
													</div>
												</div>
											</div>
											@endif
											<!-- <div class="col-12">
												<div class="form-group row">
													<div class="col-md-4">
														<span>Keterangan Lain</span>
													</div>
													<div class="col-md-8">
														<textarea id="keterangan" name="keterangan" class="from-control" placeholder="Keterangan lain"></textarea>
													</div>
												</div>
											</div> -->

											<!-- button     -->
											<div class="col-md-8 offset-md-4">
												@if($data->status_validasi == 0)
												<button type="submit" class="btn-sm btn-primary mr-1 mb-1 waves-effect waves-light">Verifikasi</button>
												@endif
												@if($data->status_validasi == 1)
												<button type="submit" class="btn-sm btn-warning mr-1 mb-1 waves-effect waves-light">Unverifikasi</button>
												@endif

												<!-- @if($data->status_validasi == 0) -->
												<a href="{{route('verifikasi.tolak',$data->id)}}" class="btn-sm btn-danger mb-1 mr-2" style="font-size:11px">Ditolak</a>
												<!-- @endif
												@if($data->status_validasi == 2)
												<a href="{{route('verifikasi.tolak',$data->id)}}" class="btn-sm btn-success mb-1 mr-2" style="font-size:11px">Diterima</a>
												@endif -->

												<!-- <button class="btn-sm btn-outline-warning mr-1 mb-1 waves-effect waves-light"><a href="{{route('poinku.index')}}" style="color:coral">Batal</a></button> -->
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
@endsection