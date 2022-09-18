@extends('layouts.dashboard')
@section('content')

<h3 class="page-heading mb-4">Entri Data Tipe</h3>
<div class="card-deck">
	<div class="card col-lg-12 px-0 mb-4">
		<div class="card-body">
			<form method="post" action="{{ route ('tambah_tipe') }}">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="exampleInputEmail1">Buat Tipe Surat</label>
					<input type="text" class="form-control" name="type">
				</div>
				<button type="submit" class="btn btn-info mr-2">Buat</button>
			</form>
		</div>
	</div>
</div>

<div class="card-deck">
	<div class="card col-lg-12 px-0 mb-4">
		<div class="card-body">
			<div class="row">
				<table class="col-md-3">
					<h5>Tipe Surat</h5>
				</div>
			</div>
			<br>
			<div class="table-responsive">
				<table class="table center-aligned-table">
					<thead>
						<tr class="text-primary">
							<th>Tipe Surat</th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($type as $tipe)
						<tr class="">
							<td>{{ $tipe['type']}}</td>
							<td></td>
							<td></td>
							<td>
								<button type="button" class="btn btn-outline-success mr-2" data-toggle="modal" data-target="#examplemModal{{ $tipe->id }}">Edit</button>
								<div class="modal fade" id="examplemModal{{ $tipe->id }}" tabindex="-1" role="dialog" aria-labelledby="examplemModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="examplemModalLabel">Edit Tipe</h5>
												<button type="button" class="Kembali" data-dismiss="modal" aria-label="Kembali">
													<span aria-hidden="true">Close</span>
												</button>
											</div>
											<form action="{{action('TypeController@edit', $tipe->id) }}" method="post">
												{{ csrf_field()}}
												{{ method_field('PUT') }}
												<div class="modal-body">
													<div class="form-group">
														<label for="exampleInputEmail1">Tipe Surat</label>
														<input type="text" class="form-control" name="type" value="{{ $tipe->type}}">
													</div>
												</div>	
												<div class="modal-footer">
													<button type="submit" class="btn btn-outline-success mr-2">Edit</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</td>
							<td>
								<a href="{{ route('hapus_tipe',$tipe->id ) }}"><button class="btn btn-outline-danger">Hapus</button></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	@endsection