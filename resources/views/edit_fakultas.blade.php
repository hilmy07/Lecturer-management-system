@extends('layout.template')
@section('title', 'Edit Fakultas')
@section('content')
    <form action="/data_fakultas/update/{{ $data_fakultas->id }}" method="POST">
        @csrf
        <div class="content">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kode Fakultas</label>
                        <input type="text" id="kode_fakultas" name="kode_fakultas" class="form-control "
                            value="{{ $data_fakultas->kode_fakultas }}" readonly style="width: 100%;">

                        <div class="text-danger">
                            @error('kode_fakultas')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nama Fakultas</label>
                        <input type="text" id="nama_fakultas" name="nama_fakultas" class="form-control "
                            value="{{ $data_fakultas->nama_fakultas }}" style="width: 100%;">

                        <div class="text-danger">
                            @error('nama_fakultas')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" id="keterangan" name="keterangan" class="form-control"
                            value="{{ $data_fakultas->keterangan }}"style="width: 100%;">

                        <div class="text-danger">
                            @error('keterangan')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
