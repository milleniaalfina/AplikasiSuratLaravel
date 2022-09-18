 @extends('layouts.dashboard')
 @section('content')

 <h3 class="page-heading mb-4">Laporan</h3>
 <div class="card-deck">
 	<div class="card col-lg-12 px-0 mb-4">
 		<div class="card-body">
		 <form method="post" action="{{ route('form_laporan') }}">
 				{{ csrf_field()}}
 				<h4>Pilih Tanggal</h4>
 				<div class="row">
 					<div class="col-md-6">
 						<div class="form-group">
 							<label for="exampleInputEmail1">Dari</label>
 							<input type="date" class="form-control" name="dari">
 						</div>
 					</div>
 					<div class="col-md-6">
 						<div class="form-group">
 							<label for="exampleInputEmail1">Sampai</label>
 							<input type="date" class="form-control" name="sampai">
 						</div>
 					</div>
 				</div>
 				<div class="form-group">
 					<label>Pilih Jenis:</label>
 					<div class="form-radio">
 						<label>
 							<input name="tipe" value="disposisi" type="radio">
 							Surat 
 							<i class="input-helper"></i>
 						</label>
 					</div>
 					<div class="form-radio">
 						<label>
 							<input name="tipe" value="surat" type="radio">
 							Disposisi
 							<i class="input-helper"></i>
 						</label>
 					</div>
 				</div>

 				<div class="form-group">
 					<label>Pilih Jenis:</label>
 					<div class="form-radio">
 						<label>
 							<input name="jenis" value="masuk" type="radio">
 							Masuk 
 							<i class="input-helper"></i>
 						</label>
 					</div>
 					<div class="form-radio">
 						<label>
 							<input name="jenis" value="keluar" type="radio">
 							Keluar
 							<i class="input-helper"></i>
 						</label>
 					</div>
 				</div>
 				<!-- <a href="{{ route('pdfview',['download'=>'pdf']) }}">Unduh</a></button>

                <button type="submit" name="pdfview" value="dld" class="btn btn-outline-warning mr-2">Download PDF</button>
 -->
 				<!-- <button type="submit" class="btn btn-outline-primary mr-2">Download</button> -->
 				<!-- <button type="submit" class="btn btn-outline-danger mr-2">View In PDF</button> -->

                <button type="submit" name="pdf" value="dld" class="btn btn-primary">Download PDF</button>
                <button type="submit" name="pdf" value="liat" class="btn btn-info">Lihat PDF</button>
 			</form>	
 		</div>
 	</div>
 </div>
 @endsection