<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    public function getAllCustomer()
    {
        $data = DB::table('tbl_Customer')->get();
        return $data;
    }

    public function getById($idCustomer)
    {
        $data = DB::table('tbl_Customer')
            ->where('Cus_Id', $idCustomer)->first();
        return $data;
    }

    public function doInsert()
    {
        DB::table('tbl_Customer')->insert(
            [
                "Cus_NamaCustomer" => $this->Cus_NamaCustomer,
                "Cus_NamaToko" => $this->Cus_NamaToko,
                "Cus_NomorContact" => $this->Cus_NomorContact,
                "Cus_Email" => $this->Cus_Email,
                "Cus_Password" => $this->Cus_Password,
                "Cus_Tipe" => $this->Cus_Tipe,
            ]
        );
    }

    public function doUpdate()
    {
        if (empty($this->Cus_Password) === true) {
            DB::table('tbl_Customer')->where('Cus_Id', $this->Cus_Id)
                ->update(
                    [
                        "Cus_NamaCustomer" => $this->Cus_NamaCustomer,
                        "Cus_NamaToko" => $this->Cus_NamaToko,
                        "Cus_NomorContact" => $this->Cus_NomorContact,
                        "Cus_Email" => $this->Cus_Email,
                        "Cus_Tipe" => $this->Cus_Tipe,
                        "Cus_Active" => $this->Cus_Active,
                    ]
                );
        } else {
            DB::table('tbl_Customer')->where('Cus_Id', $this->Cus_Id)
                ->update(
                    [
                        "Cus_NamaCustomer" => $this->Cus_NamaCustomer,
                        "Cus_NamaToko" => $this->Cus_NamaToko,
                        "Cus_NomorContact" => $this->Cus_NomorContact,
                        "Cus_Email" => $this->Cus_Email,
                        "Cus_Password" => $this->Cus_Password,
                        "Cus_Tipe" => $this->Cus_Tipe,
                        "Cus_Active" => $this->Cus_Active,
                    ]
                );
        }

    }
}
