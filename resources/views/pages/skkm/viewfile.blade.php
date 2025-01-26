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
                                <iframe height="600" width="100%" src="/pdf/{{$data->panduan_file}}" frameborder="1"></iframe>
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