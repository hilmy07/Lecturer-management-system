<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dosenlb extends Model
{
    protected $table = 'dbdosenlb';
    protected $primaryKey = 'id';
    protected $fillable = ['id','nama', 'mata_kuliah'];

    public function detailData($id)
    {
        return DB::table('dbdosenlb')->where('id', $id)->first();

    }

    public function editData($id, $data)
    {
        DB::table('dbdosenlb')
        ->where('id', $id)
        ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('dbdosenlb')
        ->where('id', $id)
        ->delete();
    }

    public function my_fakultas(){
        return $this->belongsTo(Fakultas::class, 'fakultas');
    }


    public function my_jurusan(){
        return $this->belongsTo(Jurusan::class, 'jurusan');
    }

    public function allData()
    {
        return DB::table('dbdosenlb')->get();
    }

    public function addData($data)
    {
        DB::table('dbdosenlb')->insert($data);
    }
}
