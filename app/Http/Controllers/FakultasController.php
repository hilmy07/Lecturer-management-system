<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fakultas;
use App\Models\Jurusan;

class FakultasController extends Controller
{

    public function __construct()
    {
        $this->Fakultas = new Fakultas();
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // $dbfakultas = Fakultas::all();
        //     return view('tambah_fakultas',compact('dbfakultas'));
            
        // $data = [
        //     'dbfakultas' => $this->Fakultas->allData(),
        // ];
        // return view('data_fakultas', $data);

        $dbfakultas = Fakultas::all();
        return view('data_fakultas', compact('dbfakultas'));
    }

    public function detail($id)
    {
        $data = [
            'dbfakultas' => $this->Fakultas->detailData($id),
        ];
        return view('detailfakultas', $data);
    }

    public function add()
    {
        $dbfakultas = Fakultas::all();
            return view('tambah_fakultas',compact('dbfakultas'));
    }

    public function insert()
    {
        Request()->validate([
            'kode_fakultas' => 'required|unique:dbfakultas,kode_fakultas|max:20',
            'nama_fakultas' => 'required',
            // 'keterangan' => 'required',
        ], [
            'kode_fakultas.required' => 'Kode Fakultas wajib diisi',
            'kode_fakultas.unique' => 'Kode Fakultas ini telah digunakan',
            'kode_fakultas.max' => 'Kode Fakultas terlalu panjang',
            'nama_fakultas.required' => 'Nama Fakultas wajib diisi',
            // 'keterangan.required' => 'Kode Fakultas wajib diisi',
        ]);

        $data = [
            'kode_fakultas' => Request()->kode_fakultas,
            'nama_fakultas' => Request()->nama_fakultas,
            'keterangan' => Request()->keterangan,
        
        ];

        $this->Fakultas->addData($data);
        return redirect()->route('data_fakultas')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    public function edit($id){

        if (!$this->Fakultas->detailData($id)){
            abort(404);
        }

        $data = [
            'data_fakultas' => $this->Fakultas->detailData($id),
        ];
        return view('edit_fakultas', $data);
    }

    public function update($id)
    {
        Request()->validate([
            'kode_fakultas' => 'required|max:20',
            'nama_fakultas' => 'required',
            // 'keterangan' => 'required',
        ], [
            'kode_fakultas.required' => 'Kode Fakultas wajib diisi',
            'kode_fakultas.unique' => 'Kode Fakultas ini telah digunakan',
            'kode_fakultas.max' => 'Kode Fakultas terlalu panjang',
            'nama_fakultas.required' => 'Nama Fakultas wajib diisi',
            // 'keterangan.required' => 'Kode Fakultas wajib diisi',
        ]);

        $data = [
            'kode_fakultas' => Request()->kode_fakultas,
            'nama_fakultas' => Request()->nama_fakultas,
            'keterangan' => Request()->keterangan,
        
        ];

        $this->Fakultas->editData($id, $data);
        return redirect()->route('data_fakultas')->with('pesan', 'Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $this->Fakultas->deleteData($id);
        return redirect()->route('data_fakultas')->with('pesan', 'Data Berhasil Dihapus');
    }
}
