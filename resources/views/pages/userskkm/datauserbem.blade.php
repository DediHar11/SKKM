@extends('layouts.master')
@section('content')
<!-- <div class="content-overlay"></div>
<div class="header-navbar-shadow"></div> -->
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0" style="font-weight:bold;">DATA ADMIN BEM</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="content-body">
		<!-- Data list view starts -->
		<section id="data-thumb-view" class="data-thumb-view-header">
		<!-- dataTable starts -->
		<div class="table-responsive">
			<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
				<table class="table data-thumb-view dataTable no-footer dt-checkboxes-select" id="DataTables_Table_0" role="grid">
				<thead>
				<tr role="row">
					<th class="dt-checkboxes-cell dt-checkboxes-select-all sorting_disabled" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 35.1px;" data-col="0" aria-label="">
						<input type="checkbox"></th>
					<th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 190.95px;" aria-sort="ascending" aria-label="Image: activate to sort column descending">FOTO</th>
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 394.617px;" aria-label="NAME: activate to sort column ascending">NAME</th>
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 90.1167px;" aria-label="EMAIL: activate to sort column ascending">EMAIL</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 90.1167px;" aria-label="ROLES: activate to sort column ascending">ROLES</th>
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 70.9px;" aria-label="ACTION: activate to sort column ascending">ACTION</th>
				</tr>
				</thead>
				<tbody>
                @foreach($dtuser as $item)
				<tr role="row" class="odd">
					<td class="dt-checkboxes-cell">
						<input type="checkbox" class="dt-checkboxes"></td>
					<td class="product-img sorting_1">
						<img src="{{ asset ('gambar/'.$item->images) }}" alt="Tidak ada foto">
					</td>
					<td class="product-name">{{$item->name}}</td>
					<td class="product-category">{{$item->email}}</td>
                    <td class="product-category">{{$item->roles}}</td>
					<td class="product-action">
						<span class="action-delete"><a href="{{route('databem.hapusdatabem',$item->id)}}" style="color:red"><i class="feather icon-trash"></i> hapus</a></span>
					</td>
				</tr>
                @endforeach
				</tbody>
				</table>
			</div>
		</div>
		<!-- dataTable ends -->
		<!-- add new sidebar starts -->
		<div class="add-new-data-sidebar">
			<form action="{{route('dataadmin.store')}}" method="post">
			{{csrf_field()}}
				<div class="overlay-bg"></div>
				<div class="add-new-data">
					<div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
						<div>
							<h4 class="text-uppercase">Tambah User Admin</h4>
						</div>
						<div class="hide-data-sidebar">
							<i class="feather icon-x"></i>
						</div>
					</div>
					<div class="data-items pb-3 ps ps--active-y">
						<div class="data-fields px-2">
							<div class="row">
								<div class="col-sm-12 data-field-col">
									<label for="data-name">Nim/Nik/Nip</label>
									<input type="text" class="form-control" placeholder="Masukan Nim/Nik/Nip" id="nim" name="nim">
								</div>
								<div class="col-sm-12 data-field-col">
									<label for="data-name">Name</label>
									<input type="text" class="form-control" placeholder="Masukan nama lengkap" id="name" name="name">
								</div>
								<div class="col-sm-12 data-field-col">
									<label for="data-name">Email</label>
									<input type="text" class="form-control" placeholder="Masukan email" id="email" name="email">
								</div>
								<div class="col-sm-12 data-field-col">
									<label for="data-name">Nomor WhatsApp</label>
									<input type="text" class="form-control" placeholder="Masukan nomor whatsapp" id="nohp" name="nohp">
								</div>
								<!-- <div class="col-sm-12 data-field-col">
									<label for="data-category">Akses User</label>
									<select class="form-control"  name="roles" id="data-category">
										<option disabled value>Pilih Akses User</option>
										<option value="bem">BEM</option>
										<option value="adminutama">Admin Utama</option>
									</select>
								</div> -->
								<div class="col-sm-12 data-field-col">
									<label for="data-name"><span style="color:red; font-size:16px;">Password default :</span><p style="font-weight:bold;font-size:17px;">"12345678"</p></label>
								</div>
								<div class="add-data-footer d-flex justify-content-around px-3">
									<div class="add-data-btn">
										<button type="submit" class="btn btn-primary waves-effect waves-light">Add Data</button>
									</div>
									<div class="cancel-data-btn ml-2">
										<a href="{{route('databem')}}" class="btn btn-outline-danger waves-effect waves-light">Cancel</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</form>
			</div>
			<!-- add new sidebar ends -->
	</section>
		<!-- Data list view end -->
	</div>
</div>
@endsection