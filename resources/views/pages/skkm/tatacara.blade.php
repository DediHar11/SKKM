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
							<h4 class="card-title" style="font-weight:bold;color:teal;"><i class="feather icon-book"></i>TATA CARA</h4>
						</div>
						<div class="card-content">
							<div class="card-body card-dashboard">
								<div class="table-responsive">
									<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
										<div class="row">
											<div class="col-sm-12">
												<table class="table zero-configuration dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
													<thead>
														<tr role="row" style="background-color:royalblue;">
															<th class="sorting" style="width: 940.001px;color:black; text-align:center;" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">KETERANGAN FILE</th>
															<th class="sorting" style="width: 40.872px;color:black;text-align:center;" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">DOWNLOAD</th>
															<th class="sorting" style="width: 210.333px;color:black; text-align:center;" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">AKSI</th>
														</tr>
													</thead>
													<tbody>
													@foreach($data as $row)
														<tr role="row" class="odd">
															<td class="sorting_1">{{$row->nama_file}}</td>
															<td class="num" align="center">{{$row->download}}</td>
															<td align="center">
																<div class="chip" style="background-color:forestgreen;">
																	<div class="chip-body">
																		
																		<div class="chip-text" style="color:white"><a href="{{route('tatacara.show',$row->id)}}" style="color:white"><i class="feather icon-search"></i> View</a></div>
																		
																	</div>
																</div>
																<div class="chip" style="background-color:midnightblue;">
																	<div class="chip-body">
																		
																		<div class="chip-text" style="color:white"><a href="{{route('tatacara.unduh',$row->id)}}" class="plus" style="color:white"><i class="feather icon-download"></i> Download</a></div>
																		
																	</div>
																</div>
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
			</div>
		</section>
		<!-- Row grouping -->
	</div>
</div>
@endsection