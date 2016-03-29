<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    protected $table = 'tbl_admin';

    protected $fillable =
        [
            'Adm_Id', 'Adm_Nama', 'Adm_Username', 'Adm_Password', 'Adm_Level', 'Adm_Active'
        ];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'Adm_Password'
    ];

    public function checkLogin($username, $password)
    {
        $data = DB::table('tbl_Admin')
            ->where('Adm_Username', $username)
            ->where('Adm_Password', md5($password))
            ->Where('Adm_Active', '1')
            ->first();
        return $data;
    }

    public function getAllAdmin()
    {
        $data = DB::table('tbl_Admin')->get();
        return $data;
    }

    public function getById($idAdmin)
    {
        $data = DB::table('tbl_Admin')
            ->where('Adm_Id', $idAdmin)->first();
        return $data;
    }

    public function doInsert()
    {
        DB::table('tbl_Admin')->insert(
            [
                "Adm_Nama" => $this->Adm_Nama,
                "Adm_Username" => $this->Adm_Username,
                "Adm_Password" => $this->Adm_Password,
                "Adm_Level" => $this->Adm_Level,
            ]
        );
    }

    public function doUpdate()
    {
        if (empty($this->Adm_Password) === true) {
            DB::table('tbl_Admin')->where('Adm_Id', $this->Adm_Id)
                ->update(
                    [
                        "Adm_Nama" => $this->Adm_Nama,
                        "Adm_Username" => $this->Adm_Username,
                        "Adm_Level" => $this->Adm_Level,
                        "Adm_Active" => $this->Adm_Active,
                    ]
                );
        } else {
            DB::table('tbl_Admin')->where('Adm_Id', $this->Adm_Id)
                ->update(
                    [
                        "Adm_Nama" => $this->Adm_Nama,
                        "Adm_Username" => $this->Adm_Username,
                        "Adm_Password" => $this->Adm_Password,
                        "Adm_Level" => $this->Adm_Level,
                        "Adm_Active" => $this->Adm_Active,
                    ]
                );
        }

    }
}
