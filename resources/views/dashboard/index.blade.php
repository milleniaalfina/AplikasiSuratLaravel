@extends('layouts.dashboard')
@section('content')
<div class="row">
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-4">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <h4 class="text-info"><i class="fa fa-download highlight-icon" aria-hidden="true"></i></h4>
          </div>
          <div class="float-right">
            <p class="card-text text-dark"><h3>Surat Masuk</h3></p>
            <h4 class="bold-text"></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-4">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <h4 class="text-info"><i class="fa fa-upload highlight-icon" aria-hidden="true"></i></h4>
          </div>
          <div class="float-right">
            <p class="card-text text-dark"><h3>Surat Keluar</h3></p>
            <h4 class="bold-text"></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-4">
  <div class="card card-statistics">
    <div class="card-body">
      <div class="clearfix">
        <div class="float-left">
          <h4 class="text-info"><i class="fa fa-download highlight-icon" aria-hidden="true"></i></h4>
        </div>
        <div class="float-right">
          <p class="card-text text-dark"><h3>Disposisi Masuk</h3></p>
          <h4 class="bold-text"></h4>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-4">
  <div class="card card-statistics">
    <div class="card-body">
      <div class="clearfix">
        <div class="float-left">
          <h4 class="text-info"><i class="fa fa-upload highlight-icon" aria-hidden="true"></i></h4>
        </div>
        <div class="float-right">
          <p class="card-text text-dark"><h3>Disposisi Keluar</h3></p>
          <h4 class="bold-text"></h4>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
@endsection