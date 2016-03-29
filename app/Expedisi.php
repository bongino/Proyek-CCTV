<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Expedisi extends Model
{
    protected $table = 'tbl_expedisi';

    protected $fillable =
        [
            'E_Id', 'E_NamaExpedisi'
        ];

    public static function getById($idExpedisi)
    {
        $data = DB::table('tbl_expedisi')
            ->where('E_Id', $idExpedisi)->first();
        return $data;
    }

    public static function getByNama($nama)
    {
        $data = DB::table('tbl_expedisi')
            ->where('E_NamaExpedisi', $nama)->first();
        return $data;
    }

    public function getAllExpedisi()
    {
        $data = DB::table('tbl_expedisi')
            ->get();
        return $data;
    }

    public function doInsert()
    {
        DB::table('tbl_expedisi')->insertGetId(
            [
                "E_NamaExpedisi" => $this->E_NamaExpedisi,
            ]
        );
    }

    public function doUpdate()
    {
        DB::table('tbl_expedisi')->where('E_Id', $this->E_Id)
            ->update(
                [
                    "E_NamaExpedisi" => $this->E_NamaExpedisi,
                ]
            );

    }
}
