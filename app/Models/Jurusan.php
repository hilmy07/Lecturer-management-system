<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Jurusan extends Model
{
    protected $table = 'dbjurusan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kode_jurusan',
        'nama_jurusan',
        'pilih_fakultas',
        'keterangan',
    ];

    public function fakultas(){
        return $this->belongsTo(Fakultas::class, 'pilih_fakultas');
    }

    public function my_dosen2(){
        return $this->hasMany(Dosen::class,'nama','id');
    }

    // public function dosen(){
    //     return $this->hasMany(Dosen::class,'nama','id');
    // }

    public function allData()
    {
        return DB::table('dbjurusan')->get();
    }

    public function detailData($id)
    {
        return DB::table('dbjurusan')->where('id', $id)->first();

    }

    public function addData($data)
    {
        DB::table('dbjurusan')->insert($data);
    }

    public function editData($id, $data)
    {
        DB::table('dbjurusan')
        ->where('id', $id)
        ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('dbjurusan')
        ->where('id', $id)
        ->delete();
    }
}
