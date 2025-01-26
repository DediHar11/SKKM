@extends('layouts.master')
@push('plugin-style')
<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/vendors.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/pages/app-user.css')}}">
@endpush
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
							<h4 class="card-title" style="font-weight:bold;color:red;"><i class="feather icon-award"></i>VERIFIKASI POIN DITOLAK</h4>
						</div>
						<div class="card-content">
							<div class="card-body card-dashboard">
								<div class="alert alert-primary alert-dismissible fade show" role="alert">
									<p class="card-text" style="color:black">
                                        Berikut ini adalah tabel poin mahasiswa yang <h9 class="text" style="font-weight:bold ;color:red;">di tolak</h9>
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
															<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 111.683px;color:black;" aria-label="Office: activate to sort column ascending">KODE POIN</th>
															<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 180.543px;color:black;" aria-label="Age: activate to sort column ascending">TINGKAT</th>
															<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 113.767px;color:black;" aria-label="Start date: activate to sort column ascending">JABATAN/PRESTASI</th>
															<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 40.611px;color:black;" aria-label="Salary: activate to sort column ascending">AK</th>
															<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 120.611px;color:black;" aria-label="Salary: activate to sort column ascending">STATUS</th>
															<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 103.682px;color:black;" aria-label="Salary: activate to sort column ascending">AKSI</th>
															<!-- <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 103.682px;color:black;" aria-label="Salary: activate to sort column ascending">KETERANGAN LAIN</th> -->
                                                            <!-- <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 103.682px;color:black;" aria-label="Salary: activate to sort column ascending">ACTION</th> -->
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
																@if($row->status_validasi == 0)

																<button class="btn-sm btn-warning mr-1 mb-1 waves-effect waves-light">Belum Verifikasi</button>
																@endif
																@if($row->status_validasi == 1)
																<button class="btn-sm btn-success mr-1 mb-1 waves-effect waves-light">Terverifikasi</button>
																@endif
																@if($row->status_validasi == 2)
																<button class="btn-sm btn-danger mr-1 mb-1 waves-effect waves-light">Ditolak</button>
																@endif
															</td>
															<td><a href="{{route('verifikasi.edit',$row->id)}}"><i class="fa fa-edit">Check</i></a></td>
															<!-- <td>
																@if($row->status_validasi == 2)
																<p class="text-danger" style="font-weight:bold ;">Ditolak karena tidak sesuai poin akan dihapus</p>
																@else
																<p>-</p>
																@endif
															</td> -->
                                                            <!-- <td>
                                                            <a href="{{route('verifikasi.hapus',$row->id)}}" class="btn-sm btn-danger" style="font-size:11px">Hapus</a>
                                                            </td> -->
														</tr>
														@endforeach
													</tbody>
												</table>
											</div>
										</div>
										<!-- KETERANGAN -->
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