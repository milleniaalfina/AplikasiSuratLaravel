@extends('layouts.dashboard')
@section('content')

<h3 class="page-heading mb-4">Buat Surat</h3>
<div class="card-deck">
  <div class="card col-lg-12 px-0 mb-4">
    <div class="card-body">

      <form method="post" action="{{ route('tambah_surat')}} " enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="exampleInputEmail1">Penerima</label>
          <select class="form-control" size="5" name="user">
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
          </select>
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1">Subjek Surat</label>
          <input type="text" class="form-control" name="subjek">
        </div>


        <div class="form-group">
          <label form="exampleInputEmail1">Pesan</label>
          <textarea class="form-control" rows="3" name="pesan"></textarea>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Tipe Surat</label>
          <select class="form-control" name="tipe">
            @foreach($tipe as $type)
            <option value="{{ $type->id }}">{{ $type->type}}</option>
            @endforeach
          </select>
        </div>
        
        <div class="form-group">
          <label for="exampleInputFile">File Upload</label>
          <input type="file" name="file_name" class="form-control" enctype="multipart/form-data">
        </div>

          <button type="submit" class="btn btn-info mr-2">Kirim</button>
        </form>
      </div>
    </div>
    @endsection