<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreJurusanRequest;
use App\Http\Requests\UpdateJurusanRequest;
use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\Fakultas;

class JurusanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dbjurusan = Jurusan::all();
        return view('data_jurusan', compact('dbjurusan'));
    }

    public function add()
    {
        $dbfakultas = Fakultas::all();
        return view('tambah_jurusan', compact('dbfakultas'));
    }

    public function insert(StoreJurusanRequest $request)
    {
        $data = $request->validated();

        Jurusan::create($data);

        return redirect()->route('data_jurusan')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data_jurusan = Jurusan::find($id);

        if (!$data_jurusan) {
            abort(404);
        }

        $dbfakultas = Fakultas::all();
        return view('edit_jurusan', compact('dbfakultas', 'data_jurusan'));
    }

    public function update($id, UpdateJurusanRequest $request)
    {
        $data = $request->validated();

        $jurusan = Jurusan::findOrFail($id);
        $jurusan->update($data);

        return redirect()->route('data_jurusan')->with('pesan', 'Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        Jurusan::destroy($id);
        return redirect()->route('data_jurusan')->with('pesan', 'Data Berhasil Dihapus');
    }
}
