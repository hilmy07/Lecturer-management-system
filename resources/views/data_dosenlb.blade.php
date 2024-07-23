@extends('layout.template_select')
@section('title', 'Data Dosen LB')

@section('content')
<br>
<a href="/tambah_dosenlb" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add Data</a><br>

@if (session('pesan'))
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h4><i class="icon fa fa-check"></i> Success!</h4>
  {{ session('pesan') }}.
</div>
@endif

<!-- Main content -->
<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Gelar Depan</th>
                    <th>Gelar Belakang</th>
                    <th>NIP</th>
                    <th>Jabatan</th>
                    <th>No Telp</th>
                    <th>Mata Kuliah</th>
                    <th>Fakultas</th>
                    <th>Jurusan</th>
                    <th>Semester</th>
                    <th>Foto Dosen</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($dbdosenlb as $data)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->gelar_depan }}</td>
                    <td>{{ $data->gelar_belakang }}</td>
                    <td>{{ $data->nip }}</td>
                    <td>{{ $data->jabatan }}</td>
                    <td>{{ $data->no_telepon }}</td>
                    <td>
                      {{ $data->mata_kuliah1 }} <br>
                      {{ $data->mata_kuliah2 }} <br>
                      {{ $data->mata_kuliah3 }} <br>
                      {{ $data->mata_kuliah4 }} <br>
                      {{ $data->mata_kuliah5 }} <br>
                      {{ $data->mata_kuliah6 }} <br>
                      {{ $data->mata_kuliah7 }} <br>
                      {{ $data->mata_kuliah8 }} <br>
                    </td>
                    <td>{{ $data->my_fakultas->nama_fakultas }}</td>
                    <td>{{ $data->my_jurusan->nama_jurusan }}</td>
                    <td>{{ $data->semester }}</td>
                    <td><img src="{{ url('foto_dosen/'.$data->foto_dosen) }}" width="120px"></td>
                    <td>{{ $data->status }}</td>
                    <td>
                      <a href="/data_dosenlb/edit/{{ $data->id }}" class="btn btn-sm btn-warning">Edit</a>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id }}">
                        Delete
                      </button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Modal Delete -->
    @foreach ($dbdosenlb as $data)
    <div class="modal modal-danger fade" id="delete{{ $data->id }}">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">{{ $data->nama_dosen }}</h4>
          </div>
          <div class="modal-body">
            <p>Apakah Anda yakin ingin menghapus data ini?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
            <a href="/data_dosen/delete/{{ $data->id }}" class="btn btn-outline">Yes</a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    @endforeach

  </div>
  <!-- /.container -->
</section>
<!-- /.content -->

@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<style>
  .table {
    width: 100%;
    font-size: 14px;
  }

  .table-responsive {
    overflow-x: auto;
    white-space: nowrap;
  }

  @media (max-width: 768px) {
    .table {
      font-size: 12px;
    }
  }
</style>
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    $('#example').DataTable({
      responsive: true,
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ]
    });
  });
</script>
@endpush
