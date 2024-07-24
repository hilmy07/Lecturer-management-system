<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFakultasRequest;
use App\Http\Requests\UpdateFakultasRequest;
use Illuminate\Http\Request;
use App\Models\Fakultas;

class FakultasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $dbfakultas = Fakultas::all();
        return view('data_fakultas', compact('dbfakultas'));
    }

    public function show($id)
    {
        $dbfakultas = Fakultas::findOrFail($id);
        return view('detailfakultas', compact('dbfakultas'));
    }

    public function add()
    {
        return view('tambah_fakultas');
    }

    public function insert(StoreFakultasRequest $request)
    {
        $data = $request->validated();

        Fakultas::create($data);

        return redirect()->route('data_fakultas')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data_fakultas = Fakultas::find($id);

        if (!$data_fakultas) {
            abort(404);
        }

        return view('edit_fakultas', compact('data_fakultas'));
    }

    public function update($id, UpdateFakultasRequest $request)
    {
        $data = $request->validated();

        $fakultas = Fakultas::findOrFail($id);
        $fakultas->update($data);

        return redirect()->route('data_fakultas')->with('pesan', 'Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $fakultas = Fakultas::findOrFail($id);
        $fakultas->delete();

        return redirect()->route('data_fakultas')->with('pesan', 'Data Berhasil Dihapus');
    }
}
