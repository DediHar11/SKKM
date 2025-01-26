@extends('layouts.master')
@section('content')
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
							<h4 class="card-title" style="font-weight:bold;color:teal;"><i class="feather icon-award"></i>POINKU</h4>
							<a href="{{route('poinku.create')}}" type="url" class="btn-sm btn-success ml-auto mr-1" style="border-radius:20px;"><i class="feather icon-plus"></i> Add New</a>
							<a href="{{route('cetak')}}" class="btn-sm btn-primary" style="border-radius:20px; color:white;"><i class="fa fa-print"></i> Cetak Form</a>
						</div>
						<div class="card-content">
							<div class="card-body card-dashboard">
								<div class="alert alert-primary alert-dismissible fade show" role="alert">
									<p class="card-text" style="color:black">
										Berikut ini adalah tabel poin milik anda. Untuk <h9 class="text" style="font-weight:bold;">menambahkan</h9> data poin <h9 class="text" style="font-weight:bold;">baru</h9> klik tombol <h9 class="text" style="font-weight:bold;">Add New</h9>. Untuk <h9 class="text" style="font-weight:bold;">menampilkan</h9> data poin klik tombol pada kolom <h9 class="text" style="font-weight:bold;">AKSI</h9>. Dan untuk <h9 class="text" style="font-weight:bold;">mencetak</h9> data poin ini klik tombol <h9 class="text" style="font-weight:bold;">Cetak Form</h9>. Proses verifikasi dan validasi data poin meliputi tahap 1. Verifikasi dan validasi oleh <h9 class="text" style="font-weight:bold;">BEM</h9>.
									</p>
								</div>
								<div class="table-responsive">
									<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
										<div class="row">
											<div class="col-sm-12">
												<table class="table zero-configuration dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
													<thead>
														<tr role="row" style="background-color:royalblue;">
															<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 300.617px;color:black;" aria-sort="ascending" aria-label="Name: activate to sort column descending">NAMA KEGIATAN</th>
															<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 220.132px;color:black;" aria-label="Position: activate to sort column ascending">NO SERTIFIKAT/SK/ST</th>
															<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 101.683px;color:black;" aria-label="Office: activate to sort column ascending">KODE POIN</th>
															<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 180.543px;color:black;" aria-label="Age: activate to sort column ascending">TINGKAT</th>
															<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 113.767px;color:black;" aria-label="Start date: activate to sort column ascending">JABATAN/PRESTASI</th>
															<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 200.611px;color:black;" aria-label="Salary: activate to sort column ascending">AK</th>
															<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 103.682px;color:black;" aria-label="Salary: activate to sort column ascending">AKSI</th>
															<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 103.682px;color:black;" aria-label="Salary: activate to sort column ascending">KETERANGAN LAIN</th>
														</tr>
													</thead>
													<tbody>
														@foreach($data as $row)
														<tr role="row" class="odd">
															<td class="sorting_1">{{$row->nama_kegiatan_bhsindonesia}}</td>
															<td>{{$row->no_sertifikat}}</td>
															<td>{{$row->kode_point}}</td>
															<td>{{$row->jenis_kegiatan->jenis_kegiatan}}</td>
															<td>{{$row->prestasi_kegiatan->prestasi_kegiatan ?? ''}}</td>
															<td>{{$row->point}}</td>
															<td>
																@if ($row->status_validasi === 1)
																<button class="btn-sm btn-success">BEM</button>
																@endif
																@if($row->status_validasi == 2)
																<a href="{{route('poinku.show',$row->id)}}" class="btn-sm btn-danger mr-1 mb-1 waves-effect waves-light">Ditolak</a>
																@endif
															</td>
															<td>
																<!-- @if($row->status_validasi == 2)
																<p class="text-danger" style="font-weight:bold ;">Ditolak karena tidak sesuai & data akan hapus</p>
																@else
																<p>-</p>
																@endif -->
																<p class="text-danger" style="font-weight:bold ;">{{$row->keterangan}}</p>
															</td>
														</tr>
														@endforeach
													</tbody>
													<tfoot>
														<tr style="background-color:antiquewhite;">
															<th rowspan="1" colspan="1"></th>
															<th rowspan="1" colspan="1"></th>
															<th rowspan="1" colspan="1"></th>
															<!-- <th rowspan="1" colspan="1"></th> -->
															<th style="color:green; text-align:right;" rowspan="1" colspan="2">TOTAL ANGKA KREDIT POIN =</th>
															<th rowspan="1" colspan="1">
																<span class="badge badge badge-success badge-pill">{{$sudah_validasi}}</span>
																<span class="badge badge badge-primary badge-pill">{{$poin_baru}}</span>
																@if ($minim->point_minim < 1) <span class="badge badge badge-danger badge-pill"><i class="fa fa-check"></i></span>
																	@else
																	<span class="badge badge badge-danger badge-pill">{{$minim->point_minim}}</span>
																	@endif
															</th>
															<th rowspan="1" colspan="1"></th>
															<th rowspan="1" colspan="1"></th>
														</tr>
													</tfoot>
												</table>
											</div>
										</div>
										<!-- KETERANGAN -->
										<div class="col-md-8 col-sm-6">
											<div class="card bg-gradient-warning">
												<div class="card-header" style="padding-bottom: 1.5rem;">
													<h4 class="card-title">KETERANGAN</h4>
													<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
													<div class="heading-elements">
														<ul class="list-inline mb-0">
															<li>
																<a data-action="collapse" class="" style="color:black;"><i class="feather icon-chevron-down"></i></a>
															</li>
														</ul>
													</div>
												</div>
												<div class="card-content collapse show">
													<div class="card-body">
														<p style="color:black">
															<span class="badge badge badge-success badge-pill">?</span> <i class="feather icon-arrow-right"></i> Indikator ini menyatakan jumlah angka kredit poin yang sudah divalidasi
															<br>
															<span class="badge badge badge-primary badge-pill">?</span> <i class="feather icon-arrow-right"></i> Indikator ini menyatakan jumlah angka kredit poin yang belum divalidasi
															<br>
															<span class="badge badge badge-danger badge-pill">?</span> <i class="feather icon-arrow-right"></i> Indikator ini menyatakan jumlah angka kredit poin minimal yang belum dicapai
														</p>
														<p style="color:red;font-weight:bold;">
															Klik <i class="feather icon-chevron-down align-middle" style="color:black"></i>pada kanan atas untuk menyembunyikan keterangan
														</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		</section>
		<!--/ Zero configuration table -->
	</div>
</div>
@endsection