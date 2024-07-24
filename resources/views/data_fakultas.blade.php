@extends('layout.template_select')
@section('title', 'Data Fakultas')

@section('content')
    <a href="/data_fakultas/add" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add Data</a><br>

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
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Fakultas</th>
                                    <th>Nama Fakultas</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dbfakultas as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->kode_fakultas }}
                                        </td>
                                        <td>{{ $data->nama_fakultas }}</td>
                                        <td>{{ $data->keterangan }}</td>
                                        <td><a href="/data_fakultas/edit{{ $data->id }}"
                                                class="btn btn-sm btn-warning">Edit</a></td>
                                        <td>
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#delete{{ $data->id }}">
                                                Delete
                                            </button>
                                            {{-- <a href="" class="btn btn-sm btn-danger">Delete</a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @foreach ($dbfakultas as $item)
                            <div class="modal modal-danger fade" id="delete{{ $item->id }}">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">{{ $item->nama_fakultas }}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah anda yakin ingin menghapus data ini ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left"
                                                data-dismiss="modal">No</button>
                                            <a href="/data_fakultas/delete/{{ $item->id }}"
                                                class="btn btn-outline">Yes</a>
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
