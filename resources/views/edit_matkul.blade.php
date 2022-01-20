@extends('layout.template')

@section('content')

<form action="/data_matkul/update/{{ $data_matkul->id }}" method="POST">

    @csrf

    <div class="content">
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">                 
                    <label>Kode Mata Kuliah</label>
                    <input type="text" id="kode_matkul" name="kode_matkul" class="form-control " value="{{ $data_matkul->kode_matkul }}" readonly style="width: 100%;">  
                    
                    <div class="text-danger">
                        @error('kode_matkul')
                            {{ $message }}
                        @enderror
                    </div>

                </div>

                <div class="form-group">
                   <label>Nama Mata Kuliah</label>
                    <input type="text" id="nama_matkul" name="nama_matkul" class="form-control " value="{{ $data_matkul->nama_matkul }}" style="width: 100%;">           
                    
                    <div class="text-danger">
                        @error('nama_matkul')
                            {{ $message }}
                        @enderror
                    </div>

                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" id="keterangan" name="keterangan" class="form-control" value="{{ $data_matkul->keterangan }}"style="width: 100%;">  
                    
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