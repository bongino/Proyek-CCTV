<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailExpedisi extends Model
{

    public function getAllExpedisi()
    {
        $data = DB::table('tbl_expedisi')
            ->join('tbl_detailexpedisi', 'tbl_expedisi.E_Id', '=', 'tbl_detailexpedisi.De_IdExpedisi')
            ->join('tbl_kota', 'tbl_kota.Kt_Id', '=', 'tbl_detailexpedisi.De_IdKota')
            ->select('tbl_expedisi.E_Id', 'tbl_expedisi.E_NamaExpedisi',
                'tbl_kota.Kt_Id', 'tbl_kota.Kt_Nama', 'tbl_detailexpedisi.De_Id', 'tbl_detailexpedisi.De_NamaVia',
                'tbl_detailexpedisi.De_Harga')
            ->get();
        return $data;
    }

    public function getById($idDetailExpedisi)
    {
        $data = DB::table('tbl_detailexpedisi')
            ->where('De_Id', $idDetailExpedisi)->first();
        return $data;
    }

    public function doInsert()
    {
        DB::table('tbl_detailexpedisi')->insertGetId(
            [
                "De_IdExpedisi" => $this->De_IdExpedisi,
                "De_IdKota" => $this->De_IdKota,
                "De_NamaVia" => $this->De_NamaVia,
                "De_Harga" => $this->De_Harga,
            ]
        );
    }

    public function doUpdate()
    {
        DB::table('tbl_detailexpedisi')->where('De_Id', $this->De_Id)
            ->update(
                [
                    "De_IdExpedisi" => $this->De_IdExpedisi,
                    "De_IdKota" => $this->De_IdKota,
                    "De_NamaVia" => $this->De_NamaVia,
                    "De_Harga" => $this->De_Harga,
                ]
            );

    }
}
