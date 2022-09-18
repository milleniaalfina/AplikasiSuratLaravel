@extends('layouts.dashboard')
@section('content')

<div class="card-deck">
	<div class="card col-lg-12 px-0 mb-4">
		<div class="card-body">
			<h5 class="card-title">{{$detail->mail_subject}}</h5>
			
			<h6 class="card-subtitle mb-2 text-muted"><i class="fa fa-user">{{Auth ::user()->name}}</i> 
			{{ App\User::where('id',$detail->mail_form)->value('name')}}|
			<i class="fa fa-clock-o"></i>{{$detail->created_at}}</h6>
			<hr>

			<h6 class="card-title">Kode Surat : {{$detail->mail_code}}</h6>

			<h6 class="card-title">Tipe Surat : {{ App\Type::where('id', $detail->id_type)->value('type')}}</h6>
			<hr>

			<p class="card-text">{!! nl2br(e($detail->description)) !!}</p>
			@if($detail->file_name != "null")
			<div class="bg-light">
				
				<div class="card-body">
					<h5 class="text-primary"><i class="fa fa-file"></i>&nbsp;&nbsp;{{$detail->file_name}}</h5>
					<hr>
						<a href="{{ route('download', $detail->file_name) }}" class="btn btn-primary btn-sm" download=""><i class="fa fa-download"></i>&nbsp;&nbsp;Download</a>
				</div>
				
			</div>
			@endif
			<hr>
			@if(!$dis)
			<div class="collapse" id="collapseExample">
				<div class="card card-body">
					<form action="{{ route('tambah_disposisi') }}" method="post">
						{{ csrf_field() }}
						
						<div class="from-group">
							<label for="exampleInputEmail1">Penerima</label>
							<select class="form-control" size="5" name="user">
								@foreach($users as $user)
								<option value="{{$user->id}}">{{$user->name}}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Pesan</label>
							<textarea class="form-control" rows="10" name="pesan"></textarea>
						</div>

						<input type="hidden" name="id_mail" value="{{$detail->id}}">
						<button type="submit" class="btn btn-info btn-block">kirim</button>
					</form>
				</div>
			</div>
			@endif
			<div class="row">
				<div class="col-md-3">
					<a href="{{ url()->previous() }}" class="btn btn-outline-success btn-block">Kembali</a>
				</div>
				<div class="col-md-3 ml-auto">
					<button class="btn btn-outline-primary btn-block" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Disposisi</button>
				</div>
			</div>
		</div>
	</div>
	@endsection
