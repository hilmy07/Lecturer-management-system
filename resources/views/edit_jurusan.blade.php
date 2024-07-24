@extends('layout.template')

@section('content')

<form action="/data_jurusan/update/{{ $data_jurusan->id }}" method="POST">
    @csrf
    <div class="content">
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label>Kode Jurusan</label>
                    <input type="text" id="kode_jurusan" name="kode_jurusan" class="form-control " value="{{ $data_jurusan->kode_jurusan }}" style="width: 100%;">

                    <div class="text-danger">
                        @error('kode_jurusan')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Pilih Fakultas</label>
                    <select type="text" id="pilih_fakultas" name="pilih_fakultas" value="{{ $data_jurusan->pilih_fakultas }}" class="form-control" style="width: 100%;">

                      <option value="">- Pilih --</option>

                      @foreach ($dbfakultas as $item)
                      <option value="{{$item->id}}" {{old('pilih_fakultas', $data_jurusan->pilih_fakultas) == $item->id ? 'selected' : null }}>{{$item->nama_fakultas}}</option>
                      @endforeach
                    </select>

                    <div class="text-danger">
                        @error('nama_fakultas')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Nama Jurusan</label>
                    <input type="text" id="nama_jurusan" name="nama_jurusan" class="form-control" value="{{ $data_jurusan->nama_jurusan }}"style="width: 100%;">

                    <div class="text-danger">
                        @error('keterangan')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" id="keterangan" name="keterangan" class="form-control" value="{{ $data_jurusan->keterangan }}"style="width: 100%;">

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
