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
					<div class="card" style="height:100%;width:100%;">
						<div class="card-header">
							<h4 class="card-title" style="font-weight:bold;color:teal;"><i class="feather icon-users"></i> DATA USER MAHASISWA SKKM</h4>
						</div>
						<div class="card-content">
							<div class="card-body card-dashboard">
								<div class="table-responsive">
									<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
										<div class="row">
											<div class="col-sm-12">
												<table class="table zero-configuration dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
													<thead>
														<tr role="row" style="background-color:crimson;">
															<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 190.617px;color:black;" aria-sort="ascending" aria-label="Name: activate to sort column descending">FOTO</th>
															<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 220.132px;color:black;" aria-label="Position: activate to sort column ascending">NAME</th>
															<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 111.683px;color:black;" aria-label="Office: activate to sort column ascending">EMAIL</th>
                                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 311.683px;color:black;" aria-label="Office: activate to sort column ascending">PRODI</th>
															<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 100.543px;color:black;" aria-label="Age: activate to sort column ascending">ROLES</th>
															<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 113.767px;color:black;" aria-label="Start date: activate to sort column ascending">ACTION</th>
														</tr>
													</thead>
													<tbody>
														@foreach($dtuser as $item)
														<tr role="row" class="odd">
															<td class="sorting_1">
                                                            <img src="{{ asset ('gambar/'.$item->images) }}" alt="Tidak ada foto"  width="90" height="95">
                                                            </td>
															<td>{{$item->name}}</td>
															<td>{{$item->email}}</td>
															<td>{{$item->prodi->prodi}}</td>
															<td>{{$item->roles}}</td>
															<td>
                                                            <span class="action-delete"><a href="{{route('datamahasiswa.hapusdatamahasiswa',$item->id)}}" style="color:red"><i class="feather icon-trash"></i> hapus</a></span>
                                                            </td>
														</tr>
														@endforeach
													</tbody>
												</table>
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