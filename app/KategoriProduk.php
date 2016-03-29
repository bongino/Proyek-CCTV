<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KategoriProduk extends Model
{

    public static function getById($idKategoriProduk)
    {
        $data = DB::table('tbl_kategoriproduk')
            ->where('Kp_Id', $idKategoriProduk)->first();
        return $data;
    }

    public static function getByNama($nama)
    {
        $data = DB::table('tbl_kategoriproduk')
            ->where('Kp_NamaKategori', $nama)->first();
        return $data;
    }

    public function getAllKategoriProduk()
    {
        $data = DB::table('tbl_kategoriproduk')->get();
        return $data;
    }

    public function doInsert()
    {
        DB::table('tbl_kategoriproduk')->insert(
            [
                "Kp_NamaKategori" => $this->Kp_NamaKategori,
            ]
        );
    }

    public function doUpdate()
    {
        DB::table('tbl_kategoriproduk')->where('Kp_Id', $this->Kp_Id)
            ->update(
                [
                    "Kp_NamaKategori" => $this->Kp_NamaKategori,
                ]
            );

    }
}
