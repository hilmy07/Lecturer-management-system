<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\Fakultas;

class JurusanController extends Controller
{
    public function __construct()
    {
        $this->Jurusan = new Jurusan();
        $this->middleware('auth');
    }

    public function index()
    {
        $dbjurusan = Jurusan::all();
        return view('data_jurusan', compact('dbjurusan'));

        // $data = [
        //     'dbjurusan' => $this->Jurusan->allData(),
        // ];

        // $dbfakultas = Jurusan::with('fakultas')->get();

        // return view('data_jurusan', $data)->with(compact('dbfakultas'));
        
       
        
    }

    public function add()
    {
        $dbfakultas = Fakultas::with('jurusan')->get();
            return view('tambah_jurusan',compact('dbfakultas'));
    }

    public function insert()
    {
        Request()->validate([
            'kode_jurusan' => 'required|unique:dbjurusan,kode_jurusan|max:20',
            'nama_jurusan' => 'required',
            'pilih_fakultas' => 'required',
            
            // 'keterangan' => 'required',
        ], [
            'kode_jurusan.required' => 'Kode jurusan wajib diisi',
            'kode_jurusan.unique' => 'Kode jurusan ini telah digunakan',
            'kode_jurusan.max' => 'Kode jurusan terlalu panjang',
            'pilih_fakultas.required' => 'Nama Fakultas wajib diisi',
            'nama_jurusan.required' => 'Nama jurusan wajib diisi',
            // 'keterangan.required' => 'Kode Fakultas wajib diisi',
        ]);

        $data = [
            'kode_jurusan' => Request()->kode_jurusan,
            'nama_jurusan' => Request()->nama_jurusan,
            'pilih_fakultas' => Request()->pilih_fakultas,
            'keterangan' => Request()->keterangan,
        
        ];

        $this->Jurusan->addData($data);
        return redirect()->route('data_jurusan')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    public function edit($id){
        

        if (!$this->Jurusan->detailData($id)){
            abort(404);
        }

        $data = [
            'data_jurusan' => $this->Jurusan->detailData($id),
        ];
        $dbfakultas = Fakultas::all();
        return view('edit_jurusan', compact('dbfakultas'), $data);
    }

    public function update($id)
    {
        Request()->validate([
            'kode_jurusan' => 'required|max:20',
            'nama_jurusan' => 'required',
            'pilih_fakultas' => 'required',
            
            // 'keterangan' => 'required',
        ], [
            'kode_jurusan.required' => 'Kode jurusan wajib diisi',
            'kode_jurusan.unique' => 'Kode jurusan ini telah digunakan',
            'kode_jurusan.max' => 'Kode jurusan terlalu panjang',
            'pilih_fakultas.required' => 'Nama Fakultas wajib diisi',
            'nama_jurusan.required' => 'Nama jurusan wajib diisi',
            // 'keterangan.required' => 'Kode Fakultas wajib diisi',
        ]);

        $data = [
            'kode_jurusan' => Request()->kode_jurusan,
            'nama_jurusan' => Request()->nama_jurusan,
            'pilih_fakultas' => Request()->pilih_fakultas,
            'keterangan' => Request()->keterangan,
        
        ];

        $this->Jurusan->editData($id, $data);
        return redirect()->route('data_jurusan')->with('pesan', 'Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $this->Jurusan->deleteData($id);
        return redirect()->route('data_jurusan')->with('pesan', 'Data Berhasil Dihapus');
    }
}
