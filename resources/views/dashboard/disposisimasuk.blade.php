@extends('layouts.dashboard')
@section('content')

<div class="card-deck">
	<div class="card col-lg-12 px-0 mb-4">
		<div class="card-body">
			<div class="row">
				<div class="col-md-3">
					<h5>Disposisi Masuk</h5>
				</div>
				<div class="col-md-3 ml-auto">
					@if($dis)
					<form action="{{ route('cari_disposisi') }}" method="post">
						@else
						<form action="{{ route('cari_surat') }}" method="post">
							@endif
							{!! csrf_field() !!}
							<!--<input type="text" class="form-control" placeholder="Pencarian" name="cari">-->
							<input type="hidden" name="type" value="masuk">
						</form>
					</div>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table center-aligned-table">
					<thead>
						<tr class="text-primary">
							<th>Tipe Surat</th>
							<th>Judul Surat</th>
							<th>Tanggal</th>
							<th>Penerima</th>
							<th>Pengirim</th>
							<th>Status</th>
							
						</tr>
					</thead>
					<tbody>
						@foreach($inbox as $mail)
						<tr @if($mail->mark == "unread") style="font-weight:bold;" @endif>
							<td>{{ App\Type::where('id',$mail->id_type)->value('type') }}</td>
							<td>{{ $mail->mail_subject }}</td>
							<td>{{ $mail->created_at }}</td>
							<td>{{ App\User::where('id',$mail->mail_from)->value('name') }}</td>
							<td>{{ App\User::where('id',$mail->mail_to)->value('name') }}</td>
							<td>{{ $mail->mark }}</td>
							<td>
								<a href="{{ route('detail_disposisi',$mail->id)}}"><button class="btn btn-outline-success" type="button">Detail</button></a>
							</td>
							<td>
								<a href="{{ route('hapus_disposisi',$mail->id)}}"><button class="btn btn-outline-danger" type="button">Hapus</button></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			{{ $inbox->links() }}
		</div>
	</div>
	@endsection