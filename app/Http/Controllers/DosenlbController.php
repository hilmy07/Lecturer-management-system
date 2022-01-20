<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DosenlbController extends Controller
{
    public function home(){
        $datalb = array(
            'menu' => 'home',
            'submenu' => ''
        );
        return view('home_admin', $datalb);
    }
    
    public function indexDosen(){
        $dosen = DB::table('dbdosenlb')
        ->get();
        $datalb = array(
            'menu' => ' ',
            'submenu' => ' ',
            'dosen' => $dosen
        );
        return view('data_dosenlb', $datalb);
    }

    public function view_dosen($nip)
    {
        $dosenlb = DB::table('dbdosenlb')->where('nip', $nip)->get();
        $data = array(
            'menu' => '',
            'submenu' => '',
            'dosen' => $dosenlb
        );
        return view('view_dosenlb', $data);
    }
    
    public function edit_dosenlb($nip)
    {
        $dosen = DB::table('dbdosenlb')->where('nip', $nip)->get();
        $data = array(
            'menu' => '',
            'submenu' => '',
            'dosen' => $dosen
        );
        return view('edit_dosenlb', $data);
    }

    public function update_dosenlb(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nip' => 'required',
            // 'gelar_depan' => 'required',
            // 'gelar_belakang' => 'required',
            'no_telepon' => 'required',
            // 'mata_kuliah' => 'required',
            'fakultas' => 'required',
            'jurusan' => 'required',
            'semester' => 'required',
            'status' => 'required',
            ]);

            if($request->has('foto_dosen')) {
                $image = $request->file('foto_dosen');
                $filename = $image->getClientOriginalName();
                $image->move(public_path('foto_dosen'), $filename);
                $service->image = $request->file('foto_dosen')->getClientOriginalName();
            }
        // $file = Request()->foto_dosen;
        // $fileName = Request()->nip .'.' . $file->extension();
        // $file->move(public_path('foto_dosen'), $fileName);

        // DB::table('dbdosenlb')->insert([
        //     'foto_dosen' => $fileName,
        // ]);

        DB::table('dbdosenlb')->where('nip', $request->nip)->update([
            'nama' => $request->nama,
            'gelar_depan' => $request->gelar_depan,
            'gelar_belakang' => $request->gelar_belakang,
            'jabatan' => $request->jabatan,
            'no_telepon' => $request->no_telepon,
            'mata_kuliah1' => $request->mata_kuliah1,   
            'mata_kuliah2' => $request->mata_kuliah2,    
            'mata_kuliah3' => $request->mata_kuliah3, 
            'mata_kuliah4' => $request->mata_kuliah4, 
            'mata_kuliah5' => $request->mata_kuliah5, 
            'mata_kuliah6' => $request->mata_kuliah6, 
            'mata_kuliah7' => $request->mata_kuliah7, 
            'mata_kuliah8' => $request->mata_kuliah8,
            'fakultas' => $request->fakultas,
            'jurusan' => $request->jurusan,
            'semester' => $request->semester,
            
            'status' => $request->status,
        ]);
        return redirect('/data_dosenlb');
    }

    public function form(){
        return view('tambah_dosenlb');
    }

    public function tambahDosen(Request $post){

        $file = Request()->foto_dosen;
        $fileName = Request()->nip .'.' . $file->extension();
        $file->move(public_path('foto_dosen'), $fileName);

        DB::table('dbdosenlb')->insert([
            'nama' => $post->nama,
            'nip' => $post->nip,
            'gelar_depan' => $post->gelar_depan,
            'gelar_belakang' => $post->gelar_belakang,
            'jabatan' => $post->jabatan,
            'no_telepon' => $post->no_telepon,
            'mata_kuliah1' => $post->mata_kuliah1,   
            'mata_kuliah2' => $post->mata_kuliah2,    
            'mata_kuliah3' => $post->mata_kuliah3, 
            'mata_kuliah4' => $post->mata_kuliah4, 
            'mata_kuliah5' => $post->mata_kuliah5, 
            'mata_kuliah6' => $post->mata_kuliah6, 
            'mata_kuliah7' => $post->mata_kuliah7, 
            'mata_kuliah8' => $post->mata_kuliah8,
            'fakultas' => $post->fakultas,
            'jurusan' => $post->jurusan,
            'semester' => $post->semester,
            'foto_dosen' => $fileName,
            'status' => $post->status,
        ]);

        return redirect('/data_dosenlb');

    }

    public function delete($nip)
    {
        DB::table('dbdosenlb')->where('nip', $nip)->delete();
        return redirect('/data_dosenlb')->with('status', 'Data Siswa Berhasil DiHapus');
    }
}
