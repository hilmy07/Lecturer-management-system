@extends('layout.template')
@section('title','Edit Dosen')

@section('content')

<form action="/data_dosen/update/{{ $data_dosen->id }}" method="POST">
    @csrf
    <div class="content">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" class="form-control " value="{{ $data_dosen->nama }}" style="width: 100%;">

                    <div class="text-danger">
                        @error('nama')
                                {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="">NIP</label>
                    <input type="text" id="nip" name="nip" class="form-control " value="{{ $data_dosen->nip }}" style="width: 100%;">

                    <div class="text-danger">
                        @error('nip')
                                {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Gelar Depan</label>
                    <input type="text" id="gelar_depan" name="gelar_depan" class="form-control " value="{{ $data_dosen->gelar_depan }}" style="width: 100%;">

                    <div class="text-danger">
                        @error('gelar_depan')
                                {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Gelar Belakang</label>
                    <input type="text" id="gelar_belakang" name="gelar_belakang" class="form-control " value="{{ $data_dosen->gelar_belakang }}" style="width: 100%;">

                    <div class="text-danger">
                        @error('gelar_belakang')
                                {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Jabatan</label>
                    <input type="text" id="jabatan" name="jabatan" class="form-control " value="{{ $data_dosen->jabatan }}" style="width: 100%;">
                </div>

                <div class="form-group">
                    <label for="">Nomor Telepon</label>
                    <input type="text" id="no_telepon" name="no_telepon" class="form-control " value="{{ $data_dosen->no_telepon }}" style="width: 100%;">

                    <div class="text-danger">
                        @error('no_telepon')
                                {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label><strong>Mata Kuliah</strong></label><br>
                    <label><input type="checkbox" name="mata_kuliah1" value="-Pendidikan Agama" @if(old('mata_kuliah1', $data_dosen->mata_kuliah1)) checked @endif>Pendidikan Agama</label><br>

                    <label><input type="checkbox" name="mata_kuliah2" value="-Bahasa Indonesia"  @if(old('mata_kuliah2', $data_dosen->mata_kuliah2)) checked @endif  >Bahasa indonesia</label><br>

                    <label><input type="checkbox" name="mata_kuliah3" value="-Bahasa Inggris" @if(old('mata_kuliah3', $data_dosen->mata_kuliah3)) checked @endif >Bahasa Inggris</label><br>

                    <label><input type="checkbox" name="mata_kuliah4" value="-Kewirausahaan" @if(old('mata_kuliah4', $data_dosen->mata_kuliah4)) checked @endif >Kewirausahaan</label><br>

                    <label><input type="checkbox" name="mata_kuliah5" value="-Pendidikan Bela Negara" @if(old('mata_kuliah5', $data_dosen->mata_kuliah5)) checked @endif  >Pendidikan Bela Negara</label><br>

                    <label><input type="checkbox" name="mata_kuliah6" value="-Pendidikan Pancasila" @if(old('mata_kuliah6', $data_dosen->mata_kuliah6)) checked @endif  >Pendidikan Pancasila</label><br>

                    <label><input type="checkbox" name="mata_kuliah7" value="-Pendidikan Kewarganegaraan" @if(old('mata_kuliah7', $data_dosen->mata_kuliah7)) checked @endif  >Kewarganegaraan</label><br>

                    <label><input type="checkbox" name="mata_kuliah8" value="-Kepemimpinan" @if(old('mata_kuliah8', $data_dosen->mata_kuliah8)) checked @endif  >Kepemimpinan</label><br>
                </div>


                <div class="form-group">
                    <label for="">Fakultas</label>
                    <!-- <input name="fakultas" class="form-control" value="{{ old('nama') }}"> -->
                    <select type="text" id="fakultas" name="fakultas" value="{{ $data_dosen->fakultas }}" class="form-control" style="width: 100%;">

                      @foreach ($dbfakultas as $item)
                      <option value="{{$item->id}}" {{$item->id == $data_dosen->id ? 'selected' : ''}} >{{$item->nama_fakultas}}</option>
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
                    <!-- <input name="jurusan" class="form-control" value="{{ old('nama') }}"> -->
                    <select type="text" id="jurusan" name="jurusan" value="{{ $data_dosen->jurusan }}" class="form-control" style="width: 100%;">
                      <option value="">- Pilih --</option>
                      @foreach ($dbjurusan as $item)
                      <option value="{{$item->id}}" {{$item->id == $data_dosen->id ? 'selected' : ''}}>{{$item->nama_jurusan}}</option>
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
                    <input type="text" id="semester" name="semester" class="form-control " value="{{ $data_dosen->semester }}" style="width: 100%;">

                    <div class="text-danger">
                        @error('semester')
                                {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Masukkan Foto Dosen</label>
                    <input name="foto_dosen" class="form-control" type="file">

                    <div id="image-preview" style="margin-top: 10px;">
                        @if($data_dosen->foto_dosen)
                            <img src="{{ asset('foto_dosen/' . $data_dosen->foto_dosen) }}" alt="Foto Dosen" style="width: 250px; height: 250px; object-fit: cover;">
                        @endif
                    </div>

                    <div class="text-danger">
                        @error('foto_dosen')
                                {{ $message }}
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label for="">Status</label>
                    <input type="text" id="status" name="status" class="form-control " value="{{ $data_dosen->status }}" style="width: 100%;">

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
    <link href="{{asset('front/select2/css/bootstrap-select.min.css')}}" rel="stylesheet">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{asset('front/select2/js/bootstrap-select.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            // Handle the file input change event
            $('#foto_dosen').change(function() {
                let reader = new FileReader();

                reader.onload = function(e) {
                    $('#image-preview').html('<img src="' + e.target.result +
                        '" alt="Foto Dosen" object-fit: cover;">');
                }

                 reader.readAsDataURL(this.files[0]);
            });

            // Initialize selectpicker
             $('.selectpicker').selectpicker();
        });
    </script>
@endpush
