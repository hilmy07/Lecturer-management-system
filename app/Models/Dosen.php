<?php

namespace App\Models;

use App\Exports\DosenExport;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dosen extends Model
{
    protected $table = 'dbdosen';
    protected $primaryKey = 'id';
    protected $fillable = ['id','nama', 'mata_kuliah'];

    // public function setCategoryAttribute($value)
    // {
    //     $this->attributes['mata_kuliah'] = json_encode($value);
    // }

    // public function getCategoryAttribute($value)
    // {
    //     return $this->attributes['mata_kuliah'] = json_decode($value);
    // }



    public function detailData($id)
    {
        return DB::table('dbdosen')->where('id', $id)->first();

    }

    public function editData($id, $data)
    {
        DB::table('dbdosen')
        ->where('id', $id)
        ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('dbdosen')
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
        return DB::table('dbdosen')->get();
    }

    public function addData($data)
    {
        DB::table('dbdosen')->insert($data);
    }

}

class Post extends Model
{
    protected $fillable = ['name','mata_kuliah'];

    public function setCategoryAttribute($value)
    {
        $this->attributes['mata_kuliah'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['mata_kuliah'] = json_decode($value);
    }
}
