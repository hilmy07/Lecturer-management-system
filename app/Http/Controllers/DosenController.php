<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Fakultas;
use App\Exports\DosenExport;
use Illuminate\Http\Request;
// use App\Exports\DosenExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
// use App\Http\Controllers\Controller;


class DosenController extends Controller
{
    public function __construct()
    {
        $this->Dosen = new Dosen();
        $this->middleware('auth');
    }

    public function index()
    {
        // if($request){
        //     $dbdosen = Dosen::where('nama', 'like', '%'.$request->.)
        // }
    
        $dbdosen = Dosen::with('my_fakultas','my_jurusan')->get();
        return view('data_dosen', compact('dbdosen'));
    }

    public function add()
    {
        $dbfakultas = Fakultas::all();
        $dbjurusan = Jurusan::all();
            return view('tambah_dosen',compact('dbjurusan','dbfakultas'));
    }

    // public function export()
    // {
    //     return Excel::download(new DosenExport,'dosen.xlsx');
    // }

    public function insert(Request $request)
    {
        
        $input = $request->all();
        $input['mata_kuliah'] = $request->input('mata_kuliah');

        Request()->validate([
            'nama' => 'required',
            'nip' => 'required|unique:dbdosen,nip',
            // 'gelar_depan' => 'required',
            // 'gelar_belakang' => 'required',
            'no_telepon' => 'required',
            
            'fakultas' => 'required',
            'jurusan' => 'required',
            'semester' => 'required',
            // 'foto_dosen' => 'required|mimes:jpg,jpeg,png|max:1000',
            'status' => 'required',
            // 'keterangan' => 'required',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'nip.required' => 'nip Fakultas wajib diisi',
            // 'gelar_depan.required' => 'gelar_depan Fakultas wajib diisi',
            // 'gelar_belakang.required' => 'gelar_belakang Fakultas wajib diisi',
            'no_telepon.required' => 'no_telepon Fakultas wajib diisi',
            
            'fakultas.required' => 'fakultas Fakultas wajib diisi',
            'jurusan.required' => 'jurusan Fakultas wajib diisi',
            'semester.required' => 'semester Fakultas wajib diisi',
            // 'foto_dosen.required' => 'foto dosen  wajib dicantumkan dan size maksimal 1 mb',
            'status.required' => 'status Fakultas wajib diisi',
            // 'keterangan.required' => 'Kode Fakultas wajib diisi',
        ]);

        $file = Request()->foto_dosen;
        $fileName = Request()->nip .'.' . $file->extension();
        $file->move(public_path('foto_dosen'), $fileName);
        // $values= Request()->['mata_kuliah'];
        // $matkul=Request()->mata_kuliah;
        // $mata_kuliah1=Request()->mata_kuliah1 = 'pendidikan_agama';
        // $mata_kuliah2=Request()->mata_kuliah2;
        // $all=mata_kuliah1,mata_kuliah2; 

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

        

        $this->Dosen->addData($data,);
        return redirect()->route('data_dosen')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    // public function store(Request $request)
    // {
    //     $input = $request->all();
    //     $input['mata_kuliah'] = $request->input('mata_kuliah');
    //     Dosen::create($input);
    //     return redirect()->route('dbdosen.index');
    // }

    public function edit($id){

        if (!$this->Dosen->detailData($id)){
            abort(404);
        }

        $data = [
            'data_dosen' => $this->Dosen->detailData($id),
        ];
        $dbfakultas = Fakultas::all();
        $dbjurusan = Jurusan::all();
        return view('edit_dosen', compact('dbfakultas','dbjurusan'), $data);
    }
    
    public function update($id)
    {

        Request()->validate([
            // 'nama' => 'required|max:20',
            'nip' => 'required',
            // 'gelar_depan' => 'required',
            // 'gelar_belakang' => 'required',
            'no_telepon' => 'required',
            // 'mata_kuliah1' => 'required',
            // 'mata_kuliah2' => 'required',
            'fakultas' => 'required',
            'jurusan' => 'required',
            'semester' => 'required',
            // 'foto_dosen' => 'required|mimes:jpg,jpeg,png|max:1024',
            'status' => 'required',
            
            
            // 'keterangan' => 'required',
        ] 
        // [
        //     'nama.required' => 'nama wajib diisi',
        //     'nip.required' => 'nip wajib diisi',
        //     'gelar_depan.required' => 'gelar_depan wajib diisi',
        //     'gelar_belakang.required' => 'gelar_belakang wajib diisi',
        //     'no_telepon.required' => 'no_telepon wajib diisi',
        //     'mata_kuliah.required' => 'mata_kuliah wajib diisi',
        //     'fakultas.required' => 'fakultas wajib diisi',
        //     'jurusan.required' => 'jurusan wajib diisi',
        //     'semester.required' => 'semester wajib diisi',
        //     'foto_dosen.required' => 'foto_dosen wajib diisi',
        //     'status.required' => 'status wajib diisi',
        //     // 'jurusan.required' => 'Nama jurusan wajib diisi',
        //     // 'keterangan.required' => 'Kode Fakultas wajib diisi',
        // ]
        );

        // $file = Request()->foto_dosen;
        // $fileName = Request()->nip .'.' . $file->extension();
        // $file->move(public_path('foto_dosen'), $fileName);

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

        $this->Dosen->editData($id, $data);
        return redirect()->route('data_dosen')->with('pesan', 'Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $this->Dosen->deleteData($id);
        return redirect()->route('data_dosen')->with('pesan', 'Data Berhasil Dihapus');
    }

    public function export()
    {
        return Excel::download(new DosenExport, 'dosen.xlsx');
    }

    
}
