<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Fakultas extends Model
{
    protected $table = 'dbfakultas';
    protected $primaryKey = 'id';
    protected $fillable = ['id','nama_fakultas'];
    
    public function jurusan(){
        return $this->hasMany(Jurusan::class,'nama_jurusan','id');
    }

    public function my_dosen1(){
        return $this->hasMany(Dosen::class,'nama','id');
    }

    public function allData()
    {
        return DB::table('dbfakultas')->get();
    }

    public function detailData($id)
    {
        return DB::table('dbfakultas')->where('id', $id)->first();

    }

    public function addData($data)
    {
        DB::table('dbfakultas')->insert($data);
    }

    public function editData($id, $data)
    {
        DB::table('dbfakultas')
        ->where('id', $id)
        ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('dbfakultas')
        ->where('id', $id)
        ->delete();
    }
    


}
