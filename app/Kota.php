<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kota extends Model
{
    protected $table = 'tbl_kota';

    protected $fillable =
        [
            'Kt_Id', 'Kt_Nama'
        ];

    public static function getById($idAdmin)
    {
        $data = DB::table('tbl_Kota')
            ->where('Kt_Id', $idAdmin)->first();
        return $data;
    }

    public static function getByNama($nama)
    {
        $data = DB::table('tbl_Kota')
            ->where('Kt_Nama', $nama)->first();
        return $data;
    }

    public function getAllKota()
    {
        $data = DB::table('tbl_Kota')->get();
        return $data;
    }

    public function doInsert()
    {
        DB::table('tbl_Kota')->insert(
            [
                "Kt_Nama" => $this->Kt_Nama,
            ]
        );
    }

    public function doUpdate()
    {
        DB::table('tbl_Kota')->where('Kt_Id', $this->Kt_Id)
            ->update(
                [
                    "Kt_Nama" => $this->Kt_Nama,
                ]
            );

    }
}
