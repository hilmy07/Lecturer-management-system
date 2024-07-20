<?php

namespace App\Http\Controllers;

use App\Models\Dosenlb;
use App\Models\Jurusan;
use App\Models\Fakultas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DosenlbExport;

class DosenlbController extends Controller
{
    protected $Dosenlb;
    public function __construct()
    {
        $this->Dosenlb = new Dosenlb();
        $this->middleware('auth');
    }

    public function index()
    {
        $dbdosenlb = Dosenlb::with('my_fakultas', 'my_jurusan')->get();
        return view('data_dosenlb', compact('dbdosenlb'));
    }

    public function add()
    {
        $dbfakultas = Fakultas::all();
        $dbjurusan = Jurusan::all();
        return view('tambah_dosenlb', compact('dbjurusan', 'dbfakultas'));
    }

    public function insert(Request $request)
    {

        $input = $request->all();
        $input['mata_kuliah'] = $request->input('mata_kuliah');

        Request()->validate([
            'nama' => 'required',
            'nip' => 'required|unique:dbdosen,nip',
            'no_telepon' => 'required',
            'fakultas' => 'required',
            'jurusan' => 'required',
            'semester' => 'required',
            'status' => 'required',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'nip.required' => 'nip Fakultas wajib diisi',
            'no_telepon.required' => 'no_telepon Fakultas wajib diisi',

            'fakultas.required' => 'fakultas Fakultas wajib diisi',
            'jurusan.required' => 'jurusan Fakultas wajib diisi',
            'semester.required' => 'semester Fakultas wajib diisi',
            'status.required' => 'status Fakultas wajib diisi',
        ]);

        $file = Request()->foto_dosen;
        $fileName = Request()->nip . '.' . $file->extension();
        $file->move(public_path('foto_dosen'), $fileName);

        $data = [
            'nama' => Request()->nama,
            'nip' => Request()->nip,
            'gelar_depan' => Request()->gelar_depan,
            'gelar_belakang' => Request()->gelar_belakang,
            'jabatan' => Request()->jabatan,
            'no_telepon' => Request()->no_telepon,
            'mata_kuliah1' => Request()->mata_kuliah1,
            'mata_kuliah2' => Request()->mata_kuliah2,
            'mata_kuliah3' => Request()->mata_kuliah3,
            'mata_kuliah4' => Request()->mata_kuliah4,
            'mata_kuliah5' => Request()->mata_kuliah5,
            'mata_kuliah6' => Request()->mata_kuliah6,
            'mata_kuliah7' => Request()->mata_kuliah7,
            'fakultas' => Request()->fakultas,
            'jurusan' => Request()->jurusan,
            'semester' => Request()->semester,
            'foto_dosen' => $fileName,
            'status' => Request()->status,
        ];
        $this->Dosenlb->addData($data,);
        return redirect()->route('data_dosenlb')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        if (!$this->Dosenlb->detailData($id)){
            abort(404);
        }

        $data = [
            'data_dosenlb' => $this->Dosenlb->detailData($id),
        ];
        $dbfakultas = Fakultas::all();
        $dbjurusan = Jurusan::all();
        return view('edit_dosenlb', compact('dbfakultas','dbjurusan'), $data);
    }


    public function update($id)
    {
        Request()->validate([
            'nip' => 'required',
            'no_telepon' => 'required',
            'fakultas' => 'required',
            'jurusan' => 'required',
            'semester' => 'required',
            'status' => 'required',
        ]);

        $data = [
            'nama' => Request()->nama,
            'nip' => Request()->nip,
            'gelar_depan' => Request()->gelar_depan,
            'gelar_belakang' => Request()->gelar_belakang,
            'jabatan' => Request()->jabatan,
            'no_telepon' => Request()->no_telepon,
            'mata_kuliah1' => Request()->mata_kuliah1,
            'mata_kuliah2' => Request()->mata_kuliah2,
            'mata_kuliah3' => Request()->mata_kuliah3,
            'mata_kuliah4' => Request()->mata_kuliah4,
            'mata_kuliah5' => Request()->mata_kuliah5,
            'mata_kuliah6' => Request()->mata_kuliah6,
            'mata_kuliah7' => Request()->mata_kuliah7,
            'fakultas' => Request()->fakultas,
            'jurusan' => Request()->jurusan,
            'semester' => Request()->semester,
            // 'foto_dosen' => Request()->foto_dosen,
            'status' => Request()->status,
        ];

        $this->Dosenlb->editData($id, $data);
        return redirect()->route('data_dosenlb')->with('pesan', 'Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $this->Dosenlb->deleteData($id);
        return redirect()->route('data_dosenlb')->with('pesan', 'Data Berhasil Dihapus');
    }

    public function export()
    {
        return Excel::download(new DosenlbExport, 'dosenlb.xlsx');
    }
}
