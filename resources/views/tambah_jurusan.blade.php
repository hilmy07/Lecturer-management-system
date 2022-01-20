@extends('layout.template')
@section('title','Tambah Jurusan')


@section('content')

<form action="/data_jurusan/insert" method="POST">

    @csrf

    <div class="content">
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">                 
                    <label>Kode Jurusan</label>
                    <input type="text" id="kode_jurusan" name="kode_jurusan" class="form-control " value="{{ old('kode_jurusan') }}" style="width: 100%;">  
                    
                    <div class="text-danger">
                        @error('kode_jurusan')
                            {{ $message }}
                        @enderror
                    </div>

                </div>

                <div class="form-group">
                    <label>Pilih Fakultas</label>
                    <select type="text" id="pilih_fakultas" name="pilih_fakultas" value="{{ old('pilih_fakultas') }}" class="form-control" style="width: 100%;">

                      <option value="">- Pilih --</option>
                      
                      @foreach ($dbfakultas as $item)
                      <option value="{{$item->id}}" {{$item->id == $item->id ? 'selected' : ''}}>{{$item->nama_fakultas}}</option>    
                      @endforeach
                      

                    </select>           
                    
                    {{-- <div class="text-danger">
                        @error('nama_fakultas')
                            {{ $message }}
                        @enderror
                    </div> --}}

                </div>

                <div class="form-group">
                    <label>Nama Jurusan</label>
                    <input type="text" id="nama_jurusan" name="nama_jurusan" class="form-control" value="{{ old('nama_jurusan') }}"style="width: 100%;">  
                    
                    <div class="text-danger">
                        @error('keterangan')
                            {{ $message }}
                        @enderror
                    </div>

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