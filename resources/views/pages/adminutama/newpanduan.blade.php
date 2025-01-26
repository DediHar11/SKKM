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
					<div class="card" style="height: 700.283px;">
						<div class="card-header">
							<h4 class="card-title" style="font-weight:bold;color:teal;"><i class="feather icon-book"></i>UPLOAD FILE TATA CARA</h4>
						</div>
						<hr>

						<div class="card-content">
							<div class="card-body">
								<!-- <div class="alert alert-primary alert-dismissible fade show" role="alert">
									<p style="color:black">
										Isilah form dibawah ini dengan baik dan benar. Semua data yang anda inputkan pada form ini haruslah asli dan bukan rekayasa serta benar-benar dapat
										dipertanggungjawabkan. Data yang diinputkan harus sesuai dengan isi bukti dokumen yang diupload.
									</p>
								</div> -->
								<form class="form form-horizontal" action="{{route('berkas.store')}}" method="post" enctype="multipart/form-data">
									{{csrf_field()}}
									<div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <span>Keterangan File</span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" id="nama_file" class="form-control" name="nama_file" value="" placeholder="Masukan Keterangan File">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-book"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- awal -->
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <span>File</span>
                                                    </div>
                                                    <div class="col-md-12" style="border-radius:4px;">
                                                        <div class="position-relative has-icon-left">
                                                            <input type="file" id="panduan_file" name="panduan_file"></input>
                                                            <div class="form-control-position">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end -->
                                            <div class="col-md-4 offset-md-0">
                                                <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Simpan</button>
                                                <a type="button" href="{{route('berkas.index')}}" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Batal</a>
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