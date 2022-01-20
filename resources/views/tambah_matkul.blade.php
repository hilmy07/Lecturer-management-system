@extends('layout.template')
@section('title','Tambah Mata Kuliah')


@section('content')

<form action="/data_matkul/insert" method="POST">

    @csrf

    <div class="content">
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">                 
                    <label>Kode Mata Kuliah</label>
                    <input type="text" id="kode_matkul" name="kode_matkul" class="form-control " value="{{ old('kode_matkul') }}" style="width: 100%;">  
                    
                    <div class="text-danger">
                        @error('kode_matkul')
                            {{ $message }}
                        @enderror
                    </div>

                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Kewarganegaraan
                    </label>
                </div>

                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        Bela Negara
                    </label>
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" id="keterangan" name="keterangan" class="form-control" value="{{ old('keterangan') }}"style="width: 100%;">  
                    
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