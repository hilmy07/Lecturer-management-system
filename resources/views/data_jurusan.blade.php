@extends('layout.template_select')
@section('title','Data Jurusan')


@section('content')
<a href="/data_jurusan/add" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add Data</a><br>

@if (session('pesan'))
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h4><i class="icon fa fa-check"></i> Success!</h4>
  {{ session('pesan') }}.
</div>
@endif

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <!-- /.box -->

        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Id</th>
                <th>Kode Jurusan</th>
                <th>Pilih Fakultas</th>
                <th>Nama Jurusan</th>
                <th>Keterangan</th>
                <th>Action</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
                @foreach ($dbjurusan as $item)
              <tr>
                <td>{{ $item -> id }}</td>
                <td>{{ $item -> kode_jurusan }}</td>
                <td>{{ $item -> fakultas -> nama_fakultas }}</td>
                <td>{{ $item -> nama_jurusan }}</td>
                <td>{{ $item -> keterangan }}</td>

              <td>
                  <a href="/data_jurusan/edit{{ $item->id }}" class="btn btn-sm btn-warning">Edit</a>
              </td>
              <td>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $item->id }}">
                  Delete
                </button>
              </td>

              </tr>
                @endforeach
              </tbody>
            </table>
            @foreach ($dbjurusan as $data)



            <div class="modal modal-danger fade" id="delete{{ $data->id }}">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">{{ $data->nama_jurusan}}</h4>
                    </div>
                    <div class="modal-body">
                      <p>Apakah anda yakin ingin menghapus data ini ?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                      <a href="/data_jurusan/delete/{{ $data->id}}" class="btn btn-outline">Yes</a>
                    </div>
                  </div>
                    <!-- /.modal-content -->
                </div>
                  <!-- /.modal-dialog -->
            </div>
            @endforeach
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->




  @endsection
