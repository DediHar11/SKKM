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
							<h4 class="card-title" style="font-weight:bold;color:teal;"><i class="feather icon-award"></i>FORM NEW POINKU</h4>
						</div>
						<hr>

						<div class="card-content">
							<div class="card-body">
								<div class="alert alert-primary alert-dismissible fade show" role="alert">
									<p style="color:black">
										Isilah form dibawah ini dengan baik dan benar. Semua data yang anda inputkan pada form ini haruslah asli dan bukan rekayasa serta benar-benar dapat
										dipertanggungjawabkan. Data yang diinputkan harus sesuai dengan isi bukti dokumen yang diupload.
									</p>
								</div>
								<!-- gambar -->
								<!-- <div class="rounded float-right">

									<img id="image-upload" src="" height="200" width="320" alt="">

								</div> -->
								<!-- endgambar -->
								<form class="form form-horizontal" action="{{route('poinku.store')}}" method="post" enctype="multipart/form-data">
									{{csrf_field()}}
									<div class="form-body">
										<div class="row">
											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-4">
														<span>Nama Kegiatan(BHS.INDONESIA)</span>
													</div>
													<div class="col-md-8">
														<input type="text" id="nama_kegiatan_bhsindonesia" class="form-control" name="nama_kegiatan_bhsindonesia" placeholder="Inputkan Nama Kegiatan Dalam Bahasa Indonesia">
													</div>
												</div>
											</div>

											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-4">
														<span>Nama Kegiatan(BHS.INGGRIS)</span>
													</div>
													<div class="col-md-8">
														<input type="text" id="nama_kegiatan_bhsinggris" class="form-control" name="nama_kegiatan_bhsinggris" placeholder="Inputkan Nama Kegiatan Dalam Bahasa Inggris">
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-4">
														<span>No Sertifikat/SK/ST</span>
													</div>
													<div class="col-md-8">
														<input type="text" id="no_sertifikat" class="form-control" name="no_sertifikat" placeholder="Inputkan Nommor Sertifikat Atau SK Atau ST">
													</div>

												</div>
											</div>
											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-4">
														<span>Kategori Kegiatan</span>
													</div>
													<div class="col-md-8">
														<div class="position-relative has-icon-chevron-down-left">
															<select class="form-control" name="kategori_kegiatan_id">
																<option value="">Pilih Kategori Kegiatan</option>
																@foreach ($kategori as $row)
																<option value="{{$row->id}}">{{$row->kategori_kegiatan}}</option>
																@endforeach
															</select>
														</div>
													</div>

												</div>
											</div>
											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-4">
														<span>Jenis/Tingkat/Organisasi Kegiatan</span>
													</div>
													<div class="col-md-8">
														<div class="position-relative has-icon-chevron-down-left">
															<select class="form-control" name="jenis_kegiatan_id">
																<option value="">Pilih Kategori Dahulu</option>
																@foreach ($jenis as $row)
																<option value="{{$row->id}}">{{$row->jenis_kegiatan}}</option>
																@endforeach
															</select>
														</div>
													</div>


												</div>
											</div>
											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-4">
														<span>Jabatan/Prestasi Kegiatan</span>
													</div>
													<div class="col-md-8">
														<div class="position-relative has-icon-chevron-down-left">
															<select class="form-control" name="prestasi_kegiatan_id">
																<option value="">Pilih Jabatan / Prestasi Kegiatan Dahulu</option>
																@foreach ($prestasi as $row)
																<option value="{{$row->id}}">{{$row->prestasi_kegiatan}}</option>
																@endforeach
															</select>
														</div>
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

															<li class="d-inline-block mr-1">
																<fieldset>
																	<label>
																		<input type="checkbox" name="sertifikats[]" value="SERTIFIKAT"> SERTIFIKAT</label>
																</fieldset>
															</li>
															<li class="d-inline-block mr-1">
																<fieldset>
																	<label>
																		<input type="checkbox" name="sertifikats[]" value="SK"> SK</label>
																</fieldset>
															</li>
															<li class="d-inline-block mr-1">
																<fieldset>
																	<label>
																		<input type="checkbox" name="sertifikats[]" value="ST"> ST</label>
																</fieldset>
															</li>
															<li class="d-inline-block mr-1">
																<fieldset>
																	<label>
																		<input type="checkbox" name="sertifikats[]" value="KARTU ANGGOTA"> KARTU ANGGOTA</label>
																</fieldset>
															</li>
															<li class="d-inline-block mr-1">
																<fieldset>
																	<label>
																		<input type="checkbox" name="sertifikats[]" value="PIAGAM"> PIAGAM</label>
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
														<span>Unggah File Dokumen</span>
													</div>
													<div class="col-md-8">
														<fieldset class="form-group">
															<input type="file" name="scan_sertifikat" class="form-control-file" id="scan_sertifikat">
														</fieldset>
													</div>

												</div>
											</div>
											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-4">
														
													</div>
													<div class="col-md-8">
														<fieldset class="form-group">
															<img id="image-upload" src="" height="200" width="320" alt="">
														</fieldset>
													</div>

												</div>
											</div>

											<!-- button     -->
											<div class="col-md-8 offset-md-4">
												<button type="submit" class="btn-sm btn-primary mr-1 mb-1 waves-effect waves-light" style="color:white">Save</button>
												<button class="btn-sm btn-outline-warning mr-1 mb-1 waves-effect waves-light" style="color:coral"><a href="{{route('poinku.index')}}" style="color:orange;">Batal</a></button>
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