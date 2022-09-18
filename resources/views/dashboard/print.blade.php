@extends('layouts.dashboard') 
@section('title','Print')
@section('content') 

<div class="card-deck"> 
	<div class="card col-lg-12 px-0 mb-4"> 
		<div class="card-body"> 
			<h4>Laporan</h4><br> 
			<div class="row"> 
				<div class="col-md-6"> 
					<a href="{{ url()->previous() }}" class="btn btn-outline-primary btn-block">Kembali</a> 
				</div> 
				<div class="col-md-6">
					<button class="btn btn-outline-primary btn-block" onclick="window.print()"> 
						<i class="fa fa-print"></i>Print</button> 
					</div> 
				</div> 
			</div> 
			<div class="table-responsive">
				<table class="table center-aligned-table">
					<thead>
						<tr class="text-primary">
							<th>Tipe</th>
							<th>Kode</th>
							<th>Judul</th>
							<th>Tanggal</th>
							<th>Pengirim</th>
						</tr>
					</thead>
					<tbody>
						@foreach($surat as $mail)
						<tr class="">
							<td>{{ App\Type::where('id', $mail->id_type)->value('type')}}</td>
							<td>{{ $mail->mail_code}}</td>
							<td>{{ $mail->subject}}</td>
							<td>{{ $mail->created_at }}</td>
							<td>{{ App\User::where('id', $mail->mail_from)->value('name')}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	@endsection
