<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matkul;

class MatkulController extends Controller
{
    public function __construct()
    {
        $this->Matkul = new Matkul();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'dbmatkul' => $this->Matkul->allData(),
        ];
        return view('data_matkul', $data);
    }

    public function add()
    {
        return view('tambah_matkul');
    }

    public function insert()
    {
        Request()->validate([
            'kode_matkul' => 'required|unique:dbmatkul,kode_matkul|max:20',
            'nama_matkul' => 'required',
            // 'keterangan' => 'required',
        ], [
            'kode_matkul.required' => 'Kode Mata Kuliah wajib diisi',
            'kode_matkul.max' => 'Kode Mata Kuliah terlalu panjang',
            'nama_matkul.required' => 'Nama Mata Kuliah wajib diisi',
            // 'keterangan.required' => 'Kode Fakultas wajib diisi',
        ]);

        $data = [
            'kode_matkul' => Request()->kode_matkul,
            'nama_matkul' => Request()->nama_matkul,
            'keterangan' => Request()->keterangan,
        
        ];

        $this->Matkul->addData($data);
        return redirect()->route('data_matkul')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    public function edit($id){

        if (!$this->Matkul->detailData($id)){
            abort(404);
        }

        $data = [
            'data_matkul' => $this->Matkul->detailData($id),
        ];
        return view('edit_matkul', $data);
    }

    public function update($id)
    {
        Request()->validate([
            'kode_matkul' => 'required|max:20',
            'nama_matkul' => 'required',
            // 'keterangan' => 'required',
        ], [
            'kode_matkul.required' => 'Kode Fakultas wajib diisi',
            'kode_matkul.max' => 'Kode Fakultas terlalu panjang',
            'nama_matkul.required' => 'Nama Fakultas wajib diisi',
            // 'keterangan.required' => 'Kode Fakultas wajib diisi',
        ]);

        $data = [
            'kode_matkul' => Request()->kode_matkul,
            'nama_matkul' => Request()->nama_matkul,
            'keterangan' => Request()->keterangan,
        
        ];

        $this->Matkul->editData($id, $data);
        return redirect()->route('data_matkul')->with('pesan', 'Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $this->Matkul->deleteData($id);
        return redirect()->route('data_matkul')->with('pesan', 'Data Berhasil Dihapus');
    }


}
