 @extends('layouts.dashboard')
 @section('content')

 <h3 class="page-heading mb-4">User Manajemen</h3>
 <div class="card-deck">
 	<div class="card col-lg-12 px-0 mb-4">
 		<div class="card-body">
 			<form method="post" action="{{ route('tambah_user') }}">
 				{{ csrf_field()}}
        <div class="form-group">
          <label for="exampleInputEmail1">Nama</label>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
          <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Password</label>
          <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group">
         <label for="exampleInputEmail1">Level</label>
         <select class="form-control" name="level">
          <option value="Kepala Sekolah">Kepala Sekolah</option>
          <option value="Kurikulum">Kurikulum</option>
          <option value="Tata Usaha">Tata Usaha</option>
          <option value="Kesiswaan">Kesiswaan</option>
          <option value="Guru">Guru</option>
        </select>
      </div>
      <button type="submit" class="btn btn-outline-warning mr-2">Kirim</button>
      <button type="button" class="btn btn-outline-danger mr-2">Batal</button>
    </form>
  </div>
</div>
</div>
<div class="card-deck">
  <div class="card col-lg-12 px-0 mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table center-aligned-table">
          <thead>
            <tr class="text-primary">
              <th>Nama</th>
              <th>Level</th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($user as $users)
            <tr class="">
              <td>{{ $users['name']}}</td>
              <td>{{ $users['level']}}</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>
                <button type="button" class="btn btn-outline-warning mr-2" data-toggle="modal" data-target="#exampleModal{{ $users->id }}">Edit</button>
                <div class="modal fade" id="exampleModal{{ $users->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                        <button type="button" class="Kembali" data-dismiss="modal" aria-label="Kembali">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="{{action('UserController@edit', $users->id)}}" method="post">
                        {{csrf_field()}}
                        {{ method_field('PUT') }}
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control" name="name" value="{{ $users->name }}">
                          </div>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" name="username" value="{{ $users->username }}">
                          </div>
                        </div>
                        <div class="modal-body">
                          <label for="exampleInputEmail1">Level</label>
                          <select class="form-control" name="level">
                            <option value="Kepala Sekolah">Kepala Sekolah</option>
                            <option value="Kurikulum">Kurikulum</option>
                            <option value="Tata Usaha">Tata Usaha</option>
                            <option value="Kesiswaan">Kesiswaan</option>
                            <option value="Guru">Guru</option>
                          </select>
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
                <a href="{{ route('hapus_user',$users->id) }}"><button class="btn btn-outline-danger" type="button">
                  Hapus
                </button>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
