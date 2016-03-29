<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Profile extends Model
{
    protected $table = 'tbl_profile';

    protected $fillable =
        [
            'Prof_Id', 'Prof_Nama', 'Prof_Telepon', 'Prof_Bbm', 'Prof_Alamat', 'Prof_Website', 'Prof_Email'
        ];


    public function getProfile()
    {
        $data = DB::table('tbl_profile')->first();
        return $data;
    }

    public function doUpdate()
    {
        DB::table('tbl_profile')->where('Prof_Id', $this->Prof_Id)
            ->update(
                [
                    "Prof_Nama" => $this->Prof_Nama,
                    "Prof_Telepon" => $this->Prof_Telepon,
                    "Prof_Bbm" => $this->Prof_Bbm,
                    "Prof_Alamat" => $this->Prof_Alamat,
                    "Prof_Website" => $this->Prof_Website,
                    "Prof_Email" => $this->Prof_Email,
                ]
            );
    }
}
