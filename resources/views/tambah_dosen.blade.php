@extends('layout.template_select')
@section('title', 'Tambah Dosen')

@section('content')
    <form action="/data_dosen/insert" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input name="nama" class="form-control" value="{{ old('nama') }}">

                        <div class="text-danger">
                            @error('nama')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">NIP</label>
                        <input name="nip" class="form-control" value="{{ old('nip') }}">

                        <div class="text-danger">
                            @error('nip')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Gelar Depan</label>
                        <input name="gelar_depan" class="form-control" value="{{ old('gelar_depan') }}">

                        <div class="text-danger">
                            @error('gelar_depan')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Gelar Belakang</label>
                        <input name="gelar_belakang" class="form-control" value="{{ old('gelar_belakang') }}">

                        <div class="text-danger">
                            @error('gelar_belakang')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Jabatan</label>
                        <input name="jabatan" class="form-control" value="{{ old('jabatan') }}">

                    </div>

                    <div class="form-group">
                        <label for="">Nomor Telepon</label>
                        <input name="no_telepon" class="form-control" value="{{ old('no_telepon') }}">

                        <div class="text-danger">
                            @error('no_telepon')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label><strong>Mata Kuliah</strong></label><br>
                        <label><input type="checkbox" name="mata_kuliah1" value="-Pendidikan Agama"
                                {{ old('mata_kuliah1') ? 'checked' : null }}>Pendidikan Agama</label><br>

                        <label><input type="checkbox" name="mata_kuliah2" value="-Bahasa Indonesia"
                                {{ old('mata_kuliah2') ? 'checked' : null }}>Bahasa indonesia</label><br>

                        <label><input type="checkbox" name="mata_kuliah3" value="-Bahasa Inggris"
                                {{ old('mata_kuliah3') ? 'checked' : null }}>Bahasa Inggris</label><br>

                        <label><input type="checkbox" name="mata_kuliah4" value="-Kewirausahaan"
                                {{ old('mata_kuliah4') ? 'checked' : null }}>Kewirausahaan</label><br>

                        <label><input type="checkbox" name="mata_kuliah5" value="-Pendidikan Bela Negara"
                                {{ old('mata_kuliah5') ? 'checked' : null }}>Pendidikan Bela Negara</label><br>

                        <label><input type="checkbox" name="mata_kuliah6" value="-Pendidikan Pancasila"
                                {{ old('mata_kuliah6') ? 'checked' : null }}>Pendidikan Pancasila</label><br>

                        <label><input type="checkbox" name="mata_kuliah7" value="-Pendidikan Kewarganegaraan"
                                {{ old('mata_kuliah7') ? 'checked' : null }}>Kewarganegaraan</label><br>

                        <label><input type="checkbox" name="mata_kuliah8" value="-Kepemimpinan"
                                {{ old('mata_kuliah8') ? 'checked' : null }}>Kepemimpinan</label><br>
                    </div>

                    <div class="form-group">
                        <label for="">Fakultas</label>
                        <!-- <input name="fakultas" class="form-control" value=""> -->
                        <select type="text" id="fakultas" name="fakultas" class="form-control" style="width: 100%;"
                            value="{{ old('fakultas') }}">
                            <option value="">- Pilih --</option>

                            @foreach ($dbfakultas as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_fakultas }}</option>
                            @endforeach
                        </select>

                        <div class="text-danger">
                            @error('fakultas')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Jurusan</label>
                        <!-- <input name="jurusan" class="form-control" value=""> -->
                        <select type="text" id="jurusan" name="jurusan" class="form-control" style="width: 100%;"
                            value="{{ old('jurusan') }}">
                            <option value="">- Pilih --</option>
                            @foreach ($dbjurusan as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_jurusan }}</option>
                            @endforeach
                        </select>

                        <div class="text-danger">
                            @error('jurusan')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Semester</label>
                        <input name="semester" class="form-control" value="{{ old('semester') }}">

                        <div class="text-danger">
                            @error('semester')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Masukkan Foto Dosen</label>
                        <input name="foto_dosen" class="form-control" type="file" value="{{ old('foto_dosen') }}">

                        <div class="text-danger">
                            @error('foto_dosen')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Status</label>
                        <input name="status" class="form-control" value="{{ old('status') }}">

                        <div class="text-danger">
                            @error('status')
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

@push('styles')
    <link href="{{ asset('front/select2/css/bootstrap-select.min.css') }}" rel="stylesheet">
@endpush
